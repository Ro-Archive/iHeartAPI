<?php

if (isset($_GET['name'])) {
    $keyword = urlencode($_GET['name']);

    // Constants
    $search_base = 'https://api2.iheart.com/api/v1/catalog/searchAll';
    $streams_base = 'https://api.iheart.com/api/v2/content/liveStations/';

    // Function to search for station information
    function search($keyword)
    {
        global $search_base;

        $url = "{$search_base}?keywords={$keyword}&bestMatch=True&queryStation=True&queryArtist=True&queryTrack=True&queryTalkShow=True&startIndex=0&maxRows=1&queryFeaturedStation=False&queryBundle=False&queryTalkTheme=False&amp_version=4.11.0";
        $res = file_get_contents($url);

        $response_text = $res;

        $ignore_sections = ['</ns2:searchResponse>', '<ns2:searchResponse', '<duration>', '<bestMatch>', '<name>', '<description>', '<frequency>', '<band>', '<callLetters>', '<city>', '<state>', '<score>', '<newlogo>'];
        $filtered_text = $response_text;
        foreach ($ignore_sections as $section) {
            $filtered_text = str_replace($section, '', $filtered_text);
        }

        // Extract digits using regular expression
        $digits = preg_match_all('/\d+/', $filtered_text, $matches);
        return $matches[0];
    }

    // Function to get station information by ID
    function get_by_id($station_id)
    {
        global $streams_base;

        $url = "{$streams_base}{$station_id}";
        $res = file_get_contents($url);
        $body = json_decode($res, true);

        if (isset($body['errors'])) {
            return null;
        }

        return isset($body['hits'][0]) ? $body['hits'][0] : null;
    }

    // Function to print stream URLs
    function print_stream_urls($streams)
    {
        $stream_urls = [];
        foreach ($streams as $stream_type => $stream_url) {
            $stream_urls[] = [
                'type' => $stream_type,
                'url' => str_replace('\/', '//', $stream_url)
            ];
        }
        return $stream_urls;
    }

    // Function to print market details
    function print_markets($markets)
    {
        $market_details = [];
        foreach ($markets as $market) {
            $market_details[] = [
                'city' => $market['city'],
                'state' => $market['stateAbbreviation'],
                'country' => $market['country']
            ];
        }
        return $market_details;
    }

    $digits_from_search = search($keyword);

    foreach ($digits_from_search as $digit) {
        try {
            $station_id_from_search = (int)$digit;
            $station_info = get_by_id($station_id_from_search);

            if ($station_info) {
                $response = [
                    'success' => true,
                    'message' => 'Station information found.',
                    'station_name' => $station_info['name'],
                    'description' => $station_info['description'],
                    'stream_urls' => print_stream_urls($station_info['streams']),
                    'markets' => print_markets($station_info['markets'])
                ];
                header('Content-Type: application/json');
                echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                exit;
            }
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Error: Unable to convert station ID to a number.'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit; 
        }
    }

    $response = [
        'success' => false,
        'message' => 'Error: No valid station information found.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
} else {
    $response = [
        'success' => false,
        'message' => 'Error: Name parameter is required.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}
?>
