# [API TESTING APP]

----------

# Getting started
API Testing app made with Laravel
## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)



Clone the repository

    git clone https://github.com/mohdadilvp2/api-task.git

Switch to the repo folder

    cd api-task

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


`


----------

## Docker (Sail)

To install with [Docker](https://www.docker.com) using [Sail](https://laravel.com/docs/10.x/sail), run following commands:

```
git clone https://github.com/mohdadilvp2/api-task.git
cd api-task
cp .env.example .env
composer install
php artisan sail:install
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail up
```
To migrate db
```
sail artisan migrate
```
----------
## Testing
```
php artisan test
```
with sail
```
sail artisan test
```
----------
## Project Description


</br>
In this project we are fetching data from wikipedia and youtube and mergeing them together.

### Endpoint GET  api/v1/get_country_data
#### Description
This endpoint will fetch data from both wikipedia and youtube for a country
#### Parameters
- **country_code** (string, required): [gb, nl, de, fr, es, it, gr].
- **per_page** (int, required): Maximum videos per page.
- **page_token** (string, optional): Page token to fetch page from youtube api.

#### Response

- Status Code: 200 OK
- ```
    {
  "success": true,
  "data": {
    "wiki": {
      "title": "United Kindom",
      "description": "<!-- \nNewPP limit report\nParsed by mw1383\nCached time: 20231019162934\nCache expiry: 1814400\nReduced expiry: false\nComplications: []\nCPU time usage: 0.056 seconds\nReal time usage: 0.081 seconds\nPreprocessor visited node count: 160/1000000\nPost‐expand include size: 10665/2097152 bytes\nTemplate argument size: 3680/2097152 bytes\nHighest expansion depth: 13/100\nExpensive parser function count: 1/500\nUnstrip recursion depth: 0/20\nUnstrip post‐expand size: 1653/5000000 bytes\nLua time usage: 0.029/10.000 seconds\nLua memory usage: 782002/52428800 bytes\nNumber of Wikibase entities loaded: 0/400\n--><!--\nTransclusion expansion time report (%,ms,calls,template)\n100.00%   70.675      1 -total\n100.00%   70.675      1 Template:Redirect_category_shell\n 96.43%   68.150      1 Template:Mbox\n 15.22%   10.759      2 Template:Redirect_template\n 13.36%    9.439      1 Template:R_from_move\n 12.55%    8.870      1 Template:R_from_misspelling\n  3.31%    2.339      1 Template:R_from_move/except\n  3.22%    2.279      1 Template:Tl\n  2.57%    1.814      1 Template:Talk_other\n  2.17%    1.531      1 Template:C\n-->"
    },
    "yt_data": {
      "videos": [
        {
          "title": "British vs. American Cooking Challenge (ft. @SortedFood @TastingHistory)",
          "description": "Today, we're joined by @SortedFood for a British vs American crossover cooking challenge!\n\nSubscribe to Mythical Kitchen: https://www.youtube.com/mythicalkitchen?sub_confirmation=1\n\nSubmit your Dreams Become Food photos here: https://forms.gle/cBopySaTXdzG7RFr5\n\nCheck out our podcast, A Hot Dog Is A Sandwich!\nApple Podcasts: https://mythic.al/ahdias\nSpotify: https://mythic.al/hotdog\n\nClick the bell icon so you'll know when we add a new video!\n\nWant more Mythical Kitchen? Check out these playlists:\nFancy Fast Food - https://www.youtube.com/playlist?list=PLW8XZTagL0oJhk71Ip3rIzHOFY3Edw2pw\nSnack Smash - https://www.youtube.com/playlist?list=PLW8XZTagL0oKYv5beEZpH5hP8aA5ahGKQ\nFood Fears - https://www.youtube.com/playlist?list=PLW8XZTagL0oK6vh1N6DOYcdWzGyuAxjtN\nFood Feats - https://www.youtube.com/playlist?list=PLW8XZTagL0oJI4IG7pZ-y792AHI4vIbWD\n\nPick up official Mythical Kitchen merch at https://mythical.com/collections/mythical-kitchen\n\nCheck out Sporked, Mythical's new website dedicated to helping you find the best food on the shelves! - http://www.sporked.com\n\nJoin the Mythical Society: https://www.mythicalsociety.com\n\nFollow Mythical Kitchen:\nInstagram: https://instagram.com/mythicalkitchen\nFacebook: https://facebook.com/mythicalkitchen\nMythical Chef Josh's Instagram: https://instagram.com/mythicalchefjosh\n\nFollow Mythical: \nInstagram: https://instagram.com/mythical\nFacebook: https://facebook.com/mythical\nTwitter: https://twitter.com/mythical\nWebsite: https://mythical.com\n\nCheck Out Our Other Mythical Channels:\nGood Mythical Morning: https://youtube.com/goodmythicalmorning\nRhett & Link: https://youtube.com/rhettandlink\nEar Biscuits: https://applepodcasts.com/earbiscuits\nGood Mythical MORE: https://youtube.com/goodmythicalmore\n\nWant to send us something? https://mythical.com/contact\n\nIn the spirit of minimizing food waste associated with the filming of this series, Mythical is donating to the Hollywood Food Coalition ( https://hofoco.org ) who provide daily, nourishing meals to underserved communities in the Los Angeles area.\n\nClosed Captioning provided by Rev\n\nGet Mythical Kitchen gadgets and equipment!\n* Pots and Pans - https://www.amazon.com/gp/product/B01B49H5CG/ref=ppx_yo_dt_b_search_asin_title?ie=UTF8&psc=1\n* Instant Read Thermometer - https://www.amazon.com/dp/B01F59K0IW/ref=twister_B00NMQGAPS?_encoding=UTF8&psc=1\n* Immersion Blender - https://www.amazon.com/gp/product/B01J1AWUR0/ref=ox_sc_act_title_1?smid=ATVPDKIKX0DER&psc=1\n* Dehydrator - https://www.amazon.com/gp/product/B01M6AZ863/ref=ox_sc_act_title_1?smid=A2L77EE7U53NWQ&psc=1\n* Vitamix Blender - https://www.amazon.com/gp/product/B0758JHZM3/ref=ox_sc_act_title_2?smid=ATVPDKIKX0DER&psc=1\n* Food Processor - https://www.amazon.com/Cuisinart-DFP-14BCNY-Processor-Brushed-Stainless/dp/B01AXM4WV2?ref_=ast_sto_dp&th=1&psc=1\n* Kitchen Aid Stand Mixer - https://www.amazon.com/dp/B07QBDMCKH/ref=twister_B07XKC8VN4?_encoding=UTF8&psc=1\n* Kitchen AidPasta Attachment - https://www.amazon.com/KitchenAid-KSMPEXTA-Gourmet-Attachment-Interchangeable/dp/B01ENK4UV2?ref_=ast_sto_dp\n* Spice Grinder - https://www.amazon.com/KRUPS-Electric-Coffee-Grinder-Stainless/dp/B00004SPEU?ref_=ast_bbp_dp&th=1&psc=1",
          "thumbnails": {
            "default": {
              "url": "https://i.ytimg.com/vi/qN1hS9wX5hE/default.jpg"
            },
            "high": {
              "url": "https://i.ytimg.com/vi/qN1hS9wX5hE/hqdefault.jpg"
            }
          }
        }
      ],
      "next_page_token": "CAMQAA",
      "prevPageToken": "CAIQAQ",
      "total_videos": 200
    }
  }
}
### Error Response Example

```json
{
  "success": false,
  "message": "Validation errors",
  "error_code": "1003",
  "data": {
    "country_code": [
      "The selected country code is invalid. Valid list is gb, nl, de, fr, es, it and gr"
    ]
  }
}






