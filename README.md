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

Update YT_KEY with correct youtube api key

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
- **country_code** (string, required): supported codes [gb, nl, de, fr, es, it, gr].
- **per_page** (int, required): Maximum videos per page.
- **page_token** (string, optional): Page token to fetch the page from YouTube API.

#### Response

- Status Code: 200 OK
- ```
    {
  "success": true,
  "data": {
    "wiki": {
      "title": "Netherlands",
      "description": "The Netherlands (Dutch: Nederland [ˈneːdərlɑnt] ), informally Holland, is a country located in northwestern Europe with overseas territories in the Caribbean. It is the largest of four constituent countries of the Kingdom of the Netherlands. The Netherlands consists of twelve provinces; it borders Germany to the east, and Belgium to the south, with a North Sea coastline to the north and west. It also has a border with France on the split island of Saint Martin in the Caribbean. It shares maritime borders with the United Kingdom, Germany and Belgium. The official language is Dutch, with West Frisian as a secondary official language in the province of Friesland. Dutch, English and Papiamento are official in the Caribbean territories.Netherlands literally means \"lower countries\" in reference to its low elevation and flat topography, with nearly 26% falling below sea level. Most of the areas below sea level, known as polders, are the result of land reclamation that began in the 14th century. In the Republican period, which began in 1588, the Netherlands entered a unique era of political, economic, and cultural greatness, ranked among the most powerful and influential in Europe and the world; this period is known as the Dutch Golden Age. During this time, its trading companies, the Dutch East India Company and the Dutch West India Company, established colonies and trading posts all over the world.With a population of 17.9 million people, all living within a total area of 41,850 km2 (16,160 sq mi)—of which the land area is 33,500 km2 (12,900 sq mi)—the Netherlands is the 16th most densely populated country, with a density of 535 people per square kilometre (1,390 people/sq mi). Nevertheless, it is the world's second-largest exporter of food and agricultural products by value, owing to its fertile soil, mild climate, intensive agriculture, and inventiveness. The four largest cities in the Netherlands are Amsterdam, Rotterdam, The Hague and Utrecht. Amsterdam is the country's most populous city and the nominal capital.The Netherlands has been a parliamentary constitutional monarchy with a unitary structure since 1848. The country has a tradition of pillarisation and a long record of social tolerance, having legalised prostitution and euthanasia, along with maintaining a liberal drug policy. The Netherlands allowed women's suffrage in 1919 and was the first country to legalise same-sex marriage in 2001. Its mixed-market advanced economy has the thirteenth-highest per capita income globally. The Hague holds the seat of the States General, Cabinet and Supreme Court. The Port of Rotterdam is the busiest seaport in Europe. Schiphol is the busiest airport in the Netherlands, and the third busiest in Europe. The Netherlands is a founding member of the European Union, Eurozone, G10, NATO, OECD, and WTO, as well as a part of the Schengen Area and the trilateral Benelux Union. It hosts several intergovernmental organisations and international courts, many of which are centred in The Hague."
    },
    "yt_data": {
      "videos": [
        {
          "title": "Why was he yelling at him 🤨 part 1 @R6Goon",
          "description": "All content featured on this channel is owned by me or used with the original copyright owners permission.\n\n▶ Become a FREE SUBSCRIBER to me, MasFace, now!\nhttps://bit.ly/3cQasVk\n\n▶ My socials!\nInstagram    https://www.instagram.com/masface6\nFacebook     https://www.facebook.com/masface6\nTikTok           https://www.tiktok.com/@masfacee\nSnapchat      https://www.snapchat.com/add/masface6\nTwitter          https://twitter.com/MasFacee\n\n▶ Get 20% off YOUR Cardo Packtalk with my link!\nhttps://cardosystems.rfrl.co/e3288\n\n▶ Best GoPro helmet mount EVER by MotoRadds!\nhttp://motoradds.com?ref=6\n\n▶ Subscribe to Lauren's channel!\nhttps://www.youtube.com/laurchkaa\n\n▶ Get YOUR personalized video from me!\nhttps://www.cameo.com/masface6\n\n▶ Support the channel!\nPaypal           https://www.paypal.me/masface\nCashApp      $masface6\n\n▶ Shop through products I use!\nhttps://www.amazon.com/shop/masface\n\n▶ About me!\nI'm a motovlogger from Phoenix, Arizona! I've been riding motorcycles since 2015. My first motorcycle I learned how to ride on was a Suzuki GS500F. After taking a motorcycle safety course and finally gaining some confidence on the streets, I decided to purchase my second motorcycle. A Honda CBR600RR. I still own that motorcycle to this day! After some time passed I decided to add another motorcycle to the family. So I purchased a Yamaha FZ-07. That's another bike I still have to this day! Again, more time passed and guess what I did. I purchased my final bike, as of now. A Honda Grom! \n\n▶ What's a motovlog?\nA motovlog is a type of video log recorded by a person while riding a motorcycle or any motorized vehicle. The word is a neologism and portmanteau derived from \"motorcycle\", \"video\" and \"log\". A rider who creates video blogs known as a motorcycle blogger, and the action of making motovlogs is called motovlogging.\n\n▶ DISCLAIMER\nAll content uploaded onto this channel has neither any affiliation with its uploader nor any relation to the rider portrayed in any way which includes, but is not limited to his or her likeness, residing area or personal identity.\n\n#Shorts",
          "thumbnails": {
            "default": {
              "url": "https://i.ytimg.com/vi/QYdpyn47iFk/default.jpg"
            },
            "high": {
              "url": "https://i.ytimg.com/vi/QYdpyn47iFk/hqdefault.jpg"
            }
          }
        }
      ],
      "next_page_token": "CAMQAA",
      "prevPageToken": "CAIQAQ",
      "total_videos": 145
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






