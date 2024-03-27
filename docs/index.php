<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHeartAPI Documentation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            color: black;
            background-color: #f4f4f4;
        }

        h1, h2, h3 {
            color: #cc0000; /* iHeartRadio Red */
        }

        code {
            background-color: #eeeeee;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
        }

        pre {
            background-color: #f8f8f8;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow-x: auto;
        }

        .section {
            margin-bottom: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .code-section {
            margin-top: 20px;
        }

        .example-response {
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            background-color: #fff;
        }

        .api-url {
            margin-top: 10px;
            font-weight: bold;
            color: #cc0000;
        }
    </style>
</head>
<body>
    <h1>iHeartAPI Documentation</h1>

           <div class="section">
            <h3>Station API:</h3>
            <p>Retrieve station data for a specific station by providing its Station Name.</p>
            <div class="api-url">
                <p>API URL: <a href="https://ro-archive.xyz/iHeartAPI/?name=Station_name_here" target="_blank">https://ro-archive.xyz/iHeartAPI/?name=Station_name_here</a></p>
            </div>

            <h3>Example Response:</h3>
            <pre><code>{
    "success": true,
    "message": "Station information found.",
    "station_name": "KOST 103.5",
    "description": "LA's Official Holiday Music Station",
    "stream_urls": [
        {
            "type": "hls_stream",
            "url": "http://stream.revma.ihrhls.com/zc193/hls.m3u8"
        },
        {
            "type": "shoutcast_stream",
            "url": "http://stream.revma.ihrhls.com/zc193"
        },
        {
            "type": "secure_hls_stream",
            "url": "https://stream.revma.ihrhls.com/zc193/hls.m3u8"
        },
        {
            "type": "secure_shoutcast_stream",
            "url": "https://stream.revma.ihrhls.com/zc193"
        }
    ],
    "markets": [
        {
            "city": "Los Angeles",
            "state": "CA",
            "country": "US"
        }
    ]
}</code></pre>
        </div>
    </div>

           <div class="section">
            <h3>Episodes API:</h3>
            <p>Retrieve episode data for a specific podcast by providing its Episode ID.</p>
            <div class="api-url">
                <p>API URL: <a href="https://ro-archive.xyz/iHeartAPI/podcast/episodes/?id=episode_id_here" target="_blank">https://ro-archive.xyz/iHeartAPI/podcast/episodes/?id=episode_id_here</a></p>
            </div>

            <h3>Example Response:</h3>
            <pre><code>{
    "success": true,
    "data": {
        "duration": 27,
        "items": [
            {
                "contentType": "EPISODE",
                "content": {
                    "id": 127684254,
                    "title": "E10 - Abandon Ship!",
                    "duration": 626,
                    "artistId": null,
                    "artistName": null,
                    "albumId": null,
                    "albumName": null,
                    "lyricsId": null,
                    "playbackRights": null,
                    "version": null,
                    "podcastId": 121336060,
                    "description": "In this episode Disa's ship is wrecked, Kristoff and Disa have to escape a sinking ship, and we stop trying to pretend we don't have a big problem.",
                    "startDate": 1699430580000,
                    "secondsPlayed": 0,
                    "imagePath": null
                },
                "streamUrl": "https:\/\/www.podtrac.com\/pts\/redirect.mp3\/traffic.megaphone.fm\/ESP6082828597.mp3?updated=1695337595&source=iheart",
                "reportPayload": "AAAAAAICvLrieQIQMjc5NTU0OTgCDlBPRENBU1QCDkVQSVNPREUCDAISd2ViYXBwLlVTAAAAAAIIRlJFRQIAAkg2NmU5ZDNhNS1mYjU2LTRhMTktODdiYS0yMTNlODI3NTgyMjcCkJnPsQMA"
            }
        ],
        "skips": {
            "hourSkipsRemaining": 6,
            "daySkipsRemaining": 15
        }
    }
}</code></pre>

           <div class="section">
            <h3>Podcast API:</h3>
            <p>Retrieve podcast data for a specific podcast by providing its Name.</p>
            <div class="api-url">
                <p>API URL: <a href="https://ro-archive.xyz/iHeartAPI/podcast/?name=podcast_name_here" target="_blank">https://ro-archive.xyz/iHeartAPI/podcast/?name=podcast_name_here</a></p>
            </div>
    
        <h2>Example Podcast API Response:</h2>
        <pre><code>{
    "podcast_data": {
        "id": 121336060,
        "title": "Disney Frozen: Forces of Nature",
        "subtitle": "",
        "description": "Queen Anna has a lot on her plate – there are visitors in her Kingdom, a friend in need, and even the Duke of Weselton’s nephew skulking around – so when the Spirits of Nature start acting up, she knows she has to solve the problem – and fast – before things get more out of control. But when Anna and Elsa travel to the Enchanted Forest, they find mysterious copper machines that are disrupting the natural order of things. Who made these machines and what are they doing in the forest? And more importantly, how do Anna and Elsa stop them? Disney Frozen: Forces of Nature is a 12 episode audio-first story for kids 6-12. Two new episodes released every week, or listen early and ad free on Wondery+.",
        "lastUpdated": "1970-01-20 15:27:15",
        "slug": "10-disney-frozen-forces-of-nat",
        "isExternal": true,
        "isInteractive": false,
        "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzRlZTE4NjQ0LTBhZTctMTFlZS1iMmZmLWVmZTQ5Y2JmZGJiNy9pbWFnZS9Gcm96ZW5fVGlsZV9Db3Zlcl9Gb3JjZXNfb2ZfTmF0dXJlXzAyXzA3MTIyM193X2xvZ29fQUJDX0FVRElPX3dfQ29weXJpZ2h0XzMwMDB4MzAwMC5qcGc_aXhsaWI9cmFpbHMtNC4zLjEmbWF4LXc9MzAwMCZtYXgtaD0zMDAwJmZpdD1jcm9wJmF1dG89Zm9ybWF0LGNvbXByZXNz",
        "customLinks": [],
        "socialMediaLinks": [],
        "editorialContentQuery": [
            []
        ],
        "hostIds": [],
        "showType": "serial",
        "follow": false,
        "talkbackEnabled": false,
        "brand": ""
    },
    "episodes_data": {
        "data": [
            {
                "id": 127684254,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E10 - Abandon Ship!",
                "duration": "00:10:26",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode Disa's ship is wrecked, Kristoff and Disa have to escape a sinking ship, and we stop trying to pretend we don't have a big problem.",
                "startDate": "2023-11-08 08:03:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzIyNGI2YjY0LTU2NDUtMTFlZS04N2UwLWYzYzVmMDU5OGM3Zi9pbWFnZS8zNmY5NzIuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 127684255,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E9 - A Light in the Dark",
                "duration": "00:15:49",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode we learn what it is to be a Queen, Kristoff and Disa have a heart-to-heart, and inventions once again turn on their creator.",
                "startDate": "2023-11-08 08:00:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzJkZGQ1NjU0LTU2NDUtMTFlZS04YTJlLWEzOGI3NDM0ZGRhYy9pbWFnZS9mNTRkNjQuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 127149049,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E8 - The Duke of Antlers",
                "duration": "00:15:35",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode apologies are made, awkward dinner conversations are had, and we learn a lot about opera.",
                "startDate": "2023-11-01 07:03:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzIyMjUwNDJlLTU2NDUtMTFlZS04N2UwLTdiNjU5NjA5ZTUwYi9pbWFnZS9hYTE4ZGIuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 127149050,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E7 - The Confession",
                "duration": "00:15:15",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode uncomfortable secrets are revealed, digging continues, and mistakes are made. ",
                "startDate": "2023-11-01 07:00:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzJkYjdhMThlLTU2NDUtMTFlZS04YTJlLWRmY2E1NDNlYjI0MS9pbWFnZS9lZjMwMWEuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 126586444,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E6 - Magnus' Return",
                "duration": "00:18:56",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode Anna and Elsa find out what annoys Earth Giants, Kristoff tries public speaking, and an arrest is made.",
                "startDate": "2023-10-25 07:03:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzIyMDAwOTgwLTU2NDUtMTFlZS04N2UwLWMzNmZkMTMxMDcyYi9pbWFnZS9hMTA5MjYuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 126586445,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E5 - Unrest in the Enchanted Forest",
                "duration": "00:17:09",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode there is storm debris to clean up, a friend is deeply missed, Kristoff gets some life advice, and the mystery continues in the Enchanted Forest.",
                "startDate": "2023-10-25 07:00:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzJkOTI2MThhLTU2NDUtMTFlZS04YTJlLTRmZTk1Mjg3ZjRkZC9pbWFnZS81NjNlMmIuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 126041154,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E4 - The Dark Nokk",
                "duration": "00:14:55",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode there is a mysterious object in the Enchanted Forest, we learn how cold water can be, and Kristoff looks after Arendelle.",
                "startDate": "2023-10-18 07:03:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzIxZGFkZTk0LTU2NDUtMTFlZS04N2UwLTJmZTJmZWQzYWI0Yy9pbWFnZS8xNDAzOWMuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 126041155,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E3 - The Storm",
                "duration": "00:16:54",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode we batten down the hatches, learn a lot about windmills, some friends are in peril, and we start seeking an answer.",
                "startDate": "2023-10-18 07:00:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzJkNmQ0ZTY4LTU2NDUtMTFlZS04YTJlLWVmM2FlYmQzYzQ1ZC9pbWFnZS8wOGQ3ZTYuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 125451732,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E2 - Games and Questions",
                "duration": "00:15:35",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode Elsa comes to the rescue, uncomfortable questions are asked, and the Spirits of Nature make their presence known.\nTwo new episodes released every week, or listen early and ad free on Wondery+.",
                "startDate": "2023-10-11 07:03:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzIxYjUzZGUyLTU2NDUtMTFlZS04N2UwLWMzNGRmMjdkNjNiMC9pbWFnZS80Zjc5MDMuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 125451733,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "E1 - The Visitors",
                "duration": "00:19:13",
                "isExplicit": false,
                "isInteractive": false,
                "description": "In this episode we meet some new visitors to Arendelle, a broken waterwheel is fixed, we learn about a law of thermodynamics and star gazing brings us closer together.",
                "startDate": "2023-10-11 07:00:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzJkNDg4MWRjLTU2NDUtMTFlZS04YTJlLWM3NzBlMjk2MzhhZi9pbWFnZS8zZTUyZGEuanBnP2l4bGliPXJhaWxzLTQuMy4xJm1heC13PTMwMDAmbWF4LWg9MzAwMCZmaXQ9Y3JvcCZhdXRvPWZvcm1hdCxjb21wcmVzcw"
            },
            {
                "id": 121336065,
                "podcastId": 121336060,
                "podcastSlug": "10-disney-frozen-forces-of-nat",
                "title": "Introducing 'Disney Frozen: Forces of Nature'",
                "duration": "00:01:20",
                "isExplicit": false,
                "isInteractive": false,
                "description": "Listen for free starting October 11.",
                "startDate": "2023-08-22 11:00:00",
                "transcriptionAvailable": false,
                "imageUrl": "https://i.iheart.com/v3/url/aHR0cHM6Ly9tZWdhcGhvbmUuaW1naXgubmV0L3BvZGNhc3RzLzRlZTE4NjQ0LTBhZTctMTFlZS1iMmZmLWVmZTQ5Y2JmZGJiNy9pbWFnZS9Gcm96ZW5fVGlsZV9Db3Zlcl9Gb3JjZXNfb2ZfTmF0dXJlXzAyXzA3MTIyM193X2xvZ29fQUJDX0FVRElPX3dfQ29weXJpZ2h0XzMwMDB4MzAwMC5qcGc_aXhsaWI9cmFpbHMtNC4zLjEmbWF4LXc9MzAwMCZtYXgtaD0zMDAwJmZpdD1jcm9wJmF1dG89Zm9ybWF0LGNvbXByZXNz"
            }
        ],
        "links": [],
        "meta": []
    }
}</code></pre>
    </div>
</body>
</html>
