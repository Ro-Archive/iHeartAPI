<?php

// Function to fetch data from the iHeart Search API based on the keyword
function getIHeartSearchData($keyword) {
    $search_api_url = "https://us.api.iheart.com/api/v3/search/combined?boostMarketId=25&bundle=false&keyword=true&keywords=" . urlencode($keyword) . "&countryCode=US&artist=false&playlist=false&station=false&podcast=true&track=false";
    $search_response = file_get_contents($search_api_url);
    return json_decode($search_response, true);
}

// Function to fetch podcast data from the iHeart Podcast API based on podcast ID
function getIHeartPodcastData($podcast_id) {
    $podcast_api_url = "https://us.api.iheart.com/api/v3/podcast/podcasts/" . $podcast_id;
    $podcast_response = file_get_contents($podcast_api_url);
    return json_decode($podcast_response, true);
}

// Function to fetch episodes data from the iHeart Episodes API based on podcast ID
function getIHeartEpisodesData($podcast_id) {
    $episodes_api_url = "https://us.api.iheart.com/api/v3/podcast/podcasts/" . $podcast_id . "/episodes?newEnabled=true&limit=9999";
    $episodes_response = file_get_contents($episodes_api_url);
    return json_decode($episodes_response, true);
}

function formatTimestamp($timestamp) {
    return date('Y-m-d H:i:s', $timestamp / 1000);
}

function formatDuration($duration) {
    $hours = floor($duration / 3600);
    $minutes = floor(($duration % 3600) / 60);
    $seconds = $duration % 60;

    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}

function stripHtmlTags($text) {
    return strip_tags($text);
}

function replaceLineBreaks($text) {
    return str_replace("\r\n", ' ', $text);
}

$keyword = isset($_GET['name']) ? $_GET['name'] : '';

if (!empty($keyword)) {
    $search_data = getIHeartSearchData($keyword);

    if (isset($search_data['results']) && !empty($search_data['results'])) {
        $first_result = $search_data['results'][0];
        $podcast_id = isset($first_result['id']) ? $first_result['id'] : '';

        if (!empty($podcast_id)) {
            $podcast_data = getIHeartPodcastData($podcast_id);
            $episodes_data = getIHeartEpisodesData($podcast_id);

            if (isset($episodes_data['data']) && !empty($episodes_data['data'])) {
                foreach ($episodes_data['data'] as &$episode) {
                    $episode['startDate'] = formatTimestamp($episode['startDate']);
                    $episode['duration'] = formatDuration($episode['duration']);
                    $episode['description'] = replaceLineBreaks(stripHtmlTags($episode['description']));
                }

                $podcast_data['lastUpdated'] = formatTimestamp($podcast_data['lastUpdated']);

                $combined_data = array(
                    'podcast_data' => $podcast_data,
                    'episodes_data' => $episodes_data
                );

                // Set UTF-8 encoding header
                header('Content-Type: application/json; charset=utf-8');

                echo json_encode($combined_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['error' => 'No episodes found in the episodes data.']);
            }
        } else {
            echo json_encode(['error' => 'No valid podcast ID found in the search results.']);
        }
    } else {
        echo json_encode(['error' => 'No results found in the search data.']);
    }
} else {
    echo json_encode(['error' => 'Please provide a keyword using \'?name=\' parameter.']);
}
?>
