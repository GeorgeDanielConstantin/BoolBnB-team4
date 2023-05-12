<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Apartment;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apartments')->delete();
        
        DB::table('apartments')->insert(array (
            0 => 
            array (
                'title' => 'CRÈME CARAMEL:BIENNALE AREA & WIFI',
                'description' => 'CRÈME CARAMEL is furnished with elegance, practicality and taste. In every detail we notice the owners\' constant attention in creating a welcoming environment equipped with all comforts to make the guests feel at home. Crème Caramel is on the first floor in a completely restored building in a picturesque street near the Venetian Grand Canal: the "Calle della Vida".  It is composed of a large kitchen-living room with a comfortable sofa that can be made into two separate beds or into a double bed, a bedroom with double bed and a bathroom. It is the ideal apartment in which to spend a holiday for a family or for one or two couples in Venice.  The kitchen is fully equipped as befits the great Italian culinary tradition. The apartment is equipped with all facilities, dishwasher, air conditioner, LCD satellite TV, DVD-MP3 player, internet connection, microwave, washing machine, American and Italian coffee maker, toaster, hairdryer, iron, central heating and security box. The neighbourhood wh',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/325260db2d89fed2b69d0fc663c76242',
                'address' => 'San Marco, Venezia, Veneto 30122, Italy',
                'latitude' => '45.43422638930734',
                'longitude' => '12.340194419948372',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 2,
                'square_meters' => 538,
                'visibility' => 0,
            ),
            1 => 
            array (
                'title' => 'Single room in Venice',
                'description' => 'Amazing single room with private bathroom for a woman in the heart of Venice. The apartment is on the fifth floor with no lift, but the amazing view you\'ll have of Venice will let you forgive the effort to arrive upstairs! Amazing room with private bathroom for a single woman. We are a family of three and the apartment is quite big, we can share the spaces in the respect of everyone! During your stay I\'ll be available to help you with tips on practical and cultural interestin things to do in Venice! Neighborhood is fantastic! Walking distance from the main terminals it is in the very center of the coolest area of Venice city center. I live with my two 11 and 14 daughters who are very nice and easygoing.',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/24df87c08f6f5d9451896c244b98b333',
                'address' => 'Venezia, Veneto 30125, Italy',
                'latitude' => '45.435938626913064',
                'longitude' => '12.323714939394112',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 1,
                'square_meters' => 807,
                'visibility' => 0,
            ),
            2 => 
            array (
                'title' => 'Cà 5393 SmArt, Cannaregio: sun bathed lovely house',
                'description' => 'Cà 5393 SmArt is  one of the 4 renewed apartment I rent in Campiello Widmann, a nice and quite square in the Cannaregio area, close to Fondamente Nove public trasnport station: you can get to us very easily from all over the city and from the Islands (Murano, Burano, Lido...).   The location is great: central, away from the crowd, and every kind of shop, restaurant and attraction within a walking distance. Cà 5393 SmArt is a beautiful bright apartment at the third floor, and you can enjoy a beautiful view over the canal Rio della Panada and on the venetian roofs, offering our Guests a unique sight of Venice according to a high level of privacy.        The apartment is around 80square metres, has recently been renewed, and is large enough to sleep up to 7 people really confortably. Air conditioning is available in each room, and  a strong WiFi connection is available for free.      The house is composed by: entrance, two bedrooms: the Green one, with a double bed that can be split into',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/9f0be6bfe9b82dc78f36c283bfd94f32',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.43994499448774',
                'longitude' => '12.340577355446088',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 6,
                'square_meters' => 861,
                'visibility' => 0,
            ),
            3 => 
            array (
                'title' => 'The Chromotherapy House, Venice',
                'description' => 'Are you looking for a quiet and energetic place to spend an unforgettable holiday in Venice? it\'s dedicated to the benefit of our guests: find new energy in the Chromotherapy apartment!   Chromotherapy is a beautiful 80sm apartment at the second floor, overlooking a quiet and romantic canal. It is composed by entrance, a queen bedroom, a triple one, a big living/dining room with woodden beams and a comfortable sofas, a large kitchen and a bathroom. This new beautiful flat is dedicated to who needs a very quiet but energetic place to stay: we took inspiration from the benefit of chromotherapy, and chose a particular color for each room: yellow in the living room(convivial), orange for the double bed bedroom (energy, love), lilac for the other bedroom (creativity).   The house has recently been renovated (2013) and air conditioning is available in every room with a personal thermostat. The house is eco - friendly: a card for saving energy is provided to enter the apartment, so when you l',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/197d747e122e0b5af9bb5be53482c25b',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.44142166402384',
                'longitude' => '12.33967764771956',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 5,
                'square_meters' => 915,
                'visibility' => 0,
            ),
            4 => 
            array (
                'title' => 'Venice 4 You Via Abruzzo 4',
                'description' => 'Completely renovated apartment, quiet and very bright with small wooded park behind. Newly furnished in 15-20 minutes by bus from Venice (bus stop in front of the apartment with a through every ten minutes and the ticket cost € 1.50). Equipped with every comfort; Bed linen and towels provided and you need to take a shower on arrival; air conditioning, kitchen equipped with every comfort and a table with six seats, wi fi. I don\'t live there but I am available for any help you may need! Facing the Park Hotel Ai Pini.Parcheggio reserved free enclosed with gate electric opening (for those coming by car is a big saving because parking in Venice is very expensive). Great bakery / ice cream shop / cafe in front for excellent breakfasts or to end the evening.  Excellent starting point to visit Venice, Treviso, Padua and Verona. After visiting Venice, a few kilometers you can find the Brenta Riviera with its beautiful and historic Venetian villas or Jesolo with its beach and local entertainment',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/7f299a76986678d72d7e76aea9381abf',
                'address' => 'Venezia, Veneto 30174, Italy',
                'latitude' => '45.48643924087365',
                'longitude' => '12.21632413946165',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 5,
                'square_meters' => 861,
                'visibility' => 0,
            ),
            5 => 
            array (
                'title' => 'San Polo near Train Station S.Lucia',
                'description' => 'Apartment with independent entry and with wooden ceiling beams, features of a large living-dining room furnished with one double sofa bed, one bedroom with double bed and an equipped kitchen with dining table for four persons It is 10 minutes walk from the train station Santa Lucia. You can reach San Mark Square ( Piazza San Marco) by walk or Rialto Bridge ( the  route allows you to discover very beautiful scenery ). ideal for sightseeing Cosy and romantic apartment of about 55 sq meters  located in San Polo, a typical area of historical center in Venice, well served by public means, 10 minutes walk from the railway station (Venezia Santa Lucia) and bus station and garage (Piazzale Roma), 10 minutes walk from the Rialto market and 15 minutes from the Piazza San Marco. The apartment, with independent entry,  consists of a large living-dining room furnished with one double sofa bed, bedside, lamp, dining table for four persons. The kitchen is well-furnished with gas cookers, electric ove',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/bd9c91f0425b75b01f172d53b24d2cd1',
                'address' => 'San Polo, Venezia, Veneto 30100, Italy',
                'latitude' => '45.44112144348797',
                'longitude' => '12.32883602967615',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 1,
                'square_meters' => 592,
                'visibility' => 0,
            ),
            6 => 
            array (
                'title' => 'Old Secret Venetian House & Garden',
                'description' => 'Secret Venice is a wonderful villa in Secret ‘fascinating island of Giudecca. Here you can enjoy complete privacy, surrounded by luxury hotels, studios of young artists and wealthy Venetians. Secret Venice is a wonderful villa in Secret ‘fascinating island of Giudecca. Here you can enjoy complete privacy, surrounded by luxury hotels, studios of young artists and wealthy Venetians. You can reach in just 8 minutes by ferry Piazza San Marco, have a drink at the highest point of the city just 3 minutes walk or have dinner at Cipriani restaurant, 100 meters away. The beautiful villa with its wonderful garden also has in its interior comfort and beauty, with sculptures and original paintings by Venetian artists, the great fireplace in the living room with TV, stereo and three sofas to relax in, an amazing master bedroom on the second floor with private bathroom, a double bedroom and a family room on the first floor in the sleeping area of the house with its own bathroom. Eventually enjoy a t',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/a3b705c3599038cca39df0dc170b8f04',
                'address' => 'Giudecca, Venezia, Veneto 30133, Italy',
                'latitude' => '45.426810686369706',
                'longitude' => '12.320771520872743',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 6,
                'square_meters' => 1938,
                'visibility' => 0,
            ),
            7 => 
            array (
                'title' => 'S.GIOVANNI LOFT:RIALTO & WIFI FREE - TOP APARTMENT',
                'description' => 'Elegant and comfortable apartment on the first floor of an historical building, Colleoni holidays 2 can host comfortably 6 persons and therefore it is ideal for a family or a group of friends.  It is furnished with care for the details, with oak parquet over the whole surface, the main colour of Colleoni holidays 2 is white, that gives that refined and modern tone that makes it special in the heart of beautiful Venice. The apartment is composed of a luminous and roomy living room with completely accessorised kitchen, elegant glass table and comfortable double davenport. The two bedrooms, very roomy, are composed of two double white beds with roomy wardrobes. The restroom is coated in elegant black tiles. Special feature of the restroom: the presence of a particular mosaic on the shower wall. Location The area, even though it is central and therefore close to all the important sites of the city, is not the usual destination of the mass tourism: it still maintains the fascination and the',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/13e80ad3b64f5b73ba0640b5e8b45820',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.44034390030521',
                'longitude' => '12.340106221413329',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 3,
                'square_meters' => 753,
                'visibility' => 0,
            ),
            8 => 
            array (
                'title' => 'Ca\' degli Scalzi',
                'description' => 'This apartment, located in the Cannaregio district, is the result of a wonderful fusion of traditional Venetian style and the new requirements and contemporary taste. For this reason, Ca \'degli Scalzi is the perfect solution for families or small groups of friends who want to visit Venice in comfort and complete independence. The apartment is located in a newly built residence composed of a few units in which all the apartments have an independent entrance. On the ground floor there is a small entrance with access to the first large windowed bathroom with tub and washing machine, entry also leads to a large living area consists of a modern kitchen corner fully equipped with dishwasher, microwave, toaster, kettle, aspirabricciole, dishes and a large fridge. The dining area is complemented by a wooden table (extendable) dining comfortably up to six people. On the large living area was placed a comfortable sofa bed and a single sofa bed where you can relax reading a book or watching TV af',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/648f9bc8792da283a7e4d69972765f08',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.442393381890156',
                'longitude' => '12.321383680409305',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 4,
                'square_meters' => 753,
                'visibility' => 0,
            ),
            9 => 
            array (
                'title' => 'Large elegant & oncanal:view of all',
                'description' => 'Giudecca: all the treasures the most beautiful city in the world, but it\'s quite without the tourist crazed, VIEWS of canal landscapes and the incomparable sites of the basin of San Marco: a strategic position to reach the most famous attractions. On the Giudecca canal with an amazing view of all of Venice, and just a 5 minute boat ride away from the Accademia art museum or San Marco Square, but away from the crazy tourist traps. The Giudecca Island is fun, full of art galleries, real Venetians, students and very expensive hotels...Stay here and enjoy Venice without having to wade through all the tourists! This apartment is ON THE MAIN CANAL, with amazing views, but quiet inside.  Shared bathroom, large sunny bedroom, and shared kitchen, library sitting room and formal salon music room with a 17th century organ and several other keyboard instruments. This elegantly furnished apartment feels like you are living like Vivaldi was, only with model amenities. Palanca and Rendentore boat sto',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/7061cd5560743fbdce451031bb337d93',
                'address' => 'Giudecca, Venezia, Veneto 30133, Italy',
                'latitude' => '45.42571255936031',
                'longitude' => '12.328934760492936',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 4,
                'square_meters' => 1076,
                'visibility' => 0,
            ),
            10 => 
            array (
                'title' => 'I 2 PONTI - Sestiere Cannaregio',
                'description' => 'This completely renovated duplex offers a modern and stylish environment fit for couples looking for their own privacy and comforts, for a group of friends that wants to spend their stay in Venice all together, or for families that want to feel at home with all the comforts and handiness of their own home. Above all, if you are looking for an innovative and charming accommodation in the middle of the ancient Venice, near to the most important city attractions and historical sites but at the same time in a very peaceful area where you can relax and restore yourself, you are in the right place! On the ground floor you will find a shining living area with a cosy open living room and a fully equipped kitchen with all the tools you need, included a dishwasher, a microwave and a kettle. In the living room you will find a double-sofabed, radio and satellite television. Next to the living room there is a new restored bathroom with a comfortable multifunctional shower. The sleeping area takes p',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/ae3f92fbdc539ddb7cfab2adb2af41d5',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.44513170848967',
                'longitude' => '12.33048730520677',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 6,
                'square_meters' => 624,
                'visibility' => 0,
            ),
            11 => 
            array (
                'title' => 'TRUE VENICE APARTMENT in the most genuine district',
                'description' => 'TINTORETTO is a cozy, comfortable, large (100 sqm) and airy totally renovated (2016) 3-storey apartment in Cannaregio district, just behind the majestic Madonna dell\'Orto church, Tintoretto\'s home and few steps away from the the colorful and lively Fondamenta della Misericordia, one of main spots to enjoy the Venetian way of life. Easily accessible from the aiport and train/bus station! Not just a holiday inn, but a real home! A cozy, totally renovated large apartament sleeping 2 to 7, in an authentic Venetian neighborhood! Experience the magic of sipping your glass of Prosecco sitting along the canal... that\'s Venice!  It is well and practically furnished; on the gound floor, the private entrance from an inner verdant courtyard gives access to the wide living room, which is tastefully decorated mixing fine pieces of classy forniture with colourful ornaments. It features 2 sofas (one is a double sofa bed), a dining table, a flat-screen tv. The separated kitchen has everything you may n',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/5e47bace177959bed1c1bf528e8dde2c',
                'address' => 'Venezia, Veneto 30121, Italy',
                'latitude' => '45.44567703897991',
                'longitude' => '12.330070893425214',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 4,
                'square_meters' => 237,
                'visibility' => 0,
            ),
            12 => 
            array (
                'title' => 'FENICE RIALTO PENTHOUSE:7 PAX/ WIFI',
                'description' => 'Strategic and elegant, modern and roomy, these are the adjectives used to describe the apartment Fenice Maison. Furnished with design pieces of furniture, the apartment is composed of a living room with roomy and comfortable davenport and completely accessorised kitchen, complete of fridge, microwave oven, dishwasher, a roomy double bedroom with private restroom, another double bedroom, a single bedroom and another roomy restroom. The additional comforts of the apartment are television, air conditioning, hairdryer, toaster, ironing board, vacuum cleaner, wifi and crib for children (upon request). The apartment is located on the 2ND floor. Room for 7 persons. The Fenice Maison apartment is located in a strategic position: in the core of the historical centre, a few steps from Gran Teatro La Fenice and 5 minutes away from St. Mark’s Square, where you can admire the architectural masterpieces like the Doge’s Palace and St. Mark’s Basilica. This wonderful apartment is the perfect starting',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/a7cedaad7bb3754644d6d148cebb7670',
                'address' => 'Venezia, Veneto 30124, Italy',
                'latitude' => '45.43493128153953',
                'longitude' => '12.335451905550675',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 4,
                'square_meters' => 969,
                'visibility' => 0,
            ),
            13 => 
            array (
                'title' => 'Cute apartment with private garden & speedy WIFI',
                'description' => 'Nice, calm and charming apartment with private garden: who stays here loves it! Free wifi connection, brand new bathroom, bedroom with double bed or two separate beds, large kitchen and living room which can become the second room to host a max of 5 persons in total! Shortly we will have a double bed instead of the current sofa bed you see in the living room.  In the garden there are chairs and a table, to allow you enjoying some fresh air during the evening before going to sleep. This nice apartment lies in a perfect position, in a small and quiet street (calle) beside along Fondamenta Ormesini, which is very close to the Jewish Ghetto and "Campo del Ghetto Vecchio". This apartment has a private own court where you can sit down and stay, smoke and talk to your friends, and were you can leave your pet if you travel together. Apartment has a bedroom for two persons, with double bed which can be split in two, plus a living room with sofa bed for two as well. Also, a private brand new bat',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/89354ee79068f55362e33d5d669eee53',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.44692634954691',
                'longitude' => '12.32732553963829',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 2,
                'square_meters' => 646,
                'visibility' => 0,
            ),
            14 => 
            array (
                'title' => 'Apartment in the heart of Venice',
                'description' => 'A cozy apartment in the heart of Venice recently restored with all comforts ( wi - fi ) . Extremely quiet despite being in one of the nicest and most central areas of the city . Situated in the San Marco district is located five minute walk from Piazza San Marco , Rialto and Accademia. The apartment is recently fully renovated and has a contemporary and essential style. It is located on the first floor of an ancient palace of the seventeen century, and has a area of about 810 sq. foot (75 sq. meters)  . The aparment is characterized by very high ceilings that reach 4 meters in height in the livingroom . The large windows overlook the canal . The apartment has two rooms, one with a double bed and one with a sofa bed and can comfortably accommodate 4 people . The kitchen is modern and equipped with everything you need . In the large living area ther is a dining table large enough to accomodate 6 people The access is through a private courtyard, this makes the apartement  very quiet and r',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/aa527a6916bc150601ec7faef297a783',
                'address' => 'San Marco, Venezia, Veneto 30124, Italy',
                'latitude' => '45.43536474787392',
                'longitude' => '12.330447881469173',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 2,
                'square_meters' => 2153,
                'visibility' => 0,
            ),
            15 => 
            array (
                'title' => 'Apartment in the center of Venice',
                'description' => 'In the center of Venice, near the Rialto bridge, large apartment of 100 square meters with private an exclusive garden. For two to six people. Two double bedrooms, kitchen (fully equipped), dining room, two living rooms, two full bathrooms. In the center of Venice , near the Rialto bridge, large apartment of 100 square meters with private garden. For four to six people. Two double bedrooms, a kitchen (fully equipped), a dining room, a living room with double sofa bed, two bathrooms and a private courtyard (not shared with other people). Great for those who want to stay in the heart of the city , a step away from the main monuments of Venice. But in the silence and peace . The technological equipment : wifi, dishwasher , washing machine, hair-dryer . Private courtyard. We provide sheets and towels',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/b91d4c671d7cbbc87493da26b091c0c5',
                'address' => 'San Polo, Venezia, Veneto 30125, Italy',
                'latitude' => '45.43633393528621',
                'longitude' => '12.329780508757578',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 4,
                'square_meters' => 431,
                'visibility' => 0,
            ),
            16 => 
            array (
                'title' => 'Ca\' San Lorenzo / views spectacular',
                'description' => 'Ca\' San Lorenzo with a spectacular view This stylish apartment is located just a few metres from the Basilica of St. John and St. Paul, in the Castello district. Its eight windows, looking out from the top  floor of this historic building, offer a magical view of Venice. It overlooks the S. Lorenzo canal and at the end of it, beyond the Grand Canal, it is  possible to see the Island of Saint George and all the domes of the cathedrals, from  St Mark\'s to the Church of the most Holy Redeemer, and so much more. The apartment consists of an entrance hall, a lounge, a self-contained kitchen and  a large, double bedroom. The lounge also has a convenient large,  double sofa bed. The accommodation is equipped with washing machine, microwave oven, water carbonator,  Internet connection and a TV. A small bed for a child aged between 1 and 4 can be provided on request. The ground floor of the building has a storage room that can be used for  keeping luggage or shopping etc. The area in which the',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/845e4f7eeab5df661e416f7eaf5add2a',
                'address' => 'Castello, Venezia, Veneto 30122, Italy',
                'latitude' => '45.43891160333956',
                'longitude' => '12.343209908669907',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 1,
                'square_meters' => 753,
                'visibility' => 0,
            ),
            17 => 
            array (
                'title' => 'Luminosa Venezia',
                'description' => 'Very central!!! The apartment is on the fourth floor and offers a priceless view over the rooftops of Venice. The room is spacious and the house is completely surrounded by the typical Venetian atmosphere, away from the tourist flow. 4th floor (without lift) typical Venetian and very bright house with a condo roof terrace. There is a queen bed with shared bathroom. It\'s available for long period (max. 30 days). Wi-fi internet complimentary, kitchen use , touristic guides. Although I work till 05:00 pm, I\'m disposed if you need something: I can suggest where you can eat or buy souvenirs saving money. Discreet neighbors, not crowded district like San Marco or Rialto, but close to vaporetto to take a lagoon tour, or Roma square and railway to take a mainland tour. Guests have access to the entire house except my personnel room which will remain closed during their stay. Just close to Roma Square and railway with vaporetto stop just 7 minutes on foot (San Tomà or Ca\' Rezzonico). Adjoining',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/fbf955cf76d1b2f5d30dadde7c03af71',
                'address' => 'Venezia, Veneto 30135, Italy',
                'latitude' => '45.43655313705202',
                'longitude' => '12.324022454807007',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 1,
                'square_meters' => 129,
                'visibility' => 0,
            ),
            18 => 
            array (
                'title' => 'Elegant Romantic Attic in San Marco/Fenice Theatre',
                'description' => 'Comfortable and elegant attic, just 4 minutes walk from San Marco, and 2 to La Fenice Theatre. The apartment is perfect for a couple who wants to be IN Venice and have some time to rest, having good time out of  crowd. 91 steps to reach the dream... It\'s elegant, spacious, 100 square meters in white and light blue. Lot of books, some pictures, a place to rest and chat, a place to eat and chat, a fully equipped kitchen, 1 bathroom and one bedroom under the roof. Romantic, with all you need to feel organized following your own desires. Just a step outside and you can find restaurants, boutiques, theatre, and Piazza San Marco which I suggest to cross at dawn or at sunrise... Follow any path, you\'ll discover something new and fascinating. two waterbus stops are one bridge distance: 5 minutes on one side (San Marco Giardini), 4 minutes on the other side (Santa Maria del Giglio). Rialto is 7 minutes walking distance.',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/0e733ac81551f9302f342530421dcec0',
                'address' => 'Venezia, Veneto 30124, Italy',
                'latitude' => '45.43440386358171',
                'longitude' => '12.336573585684704',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 2,
                'square_meters' => 1184,
                'visibility' => 0,
            ),
            19 => 
            array (
                'title' => 'Venice Apartment with amazing canal view',
                'description' => 'This modern and brand new apartment is located in the heart of Venice, Dorsoduro district, near Campo Santa Margherita one of the most favourite square from Venetian people. The apartment (at the second floor of a building overlooking a beautiful little campo) has two bedrooms, one double and the other can be prepared as twin or double, two bathrooms one with shower and one with bath and a comfortable spacious sunny living room. The house offers all the services you expect and the kitchen is very well-equipped. Windows overlooking two lovely canals offer a breathtaking typical Venetian canal view. In the surroundings there are restaurants, bars and a daily market with flowers, vegetables and fish. More of a spot for locals than for tourists, the Campo feels far from the mask shops and other touristic areas of Venice. The Rental Fee is inclusive of sheets, towels, welcoming service and wifi connection.',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/80401581339f3815bd166ac1a7dee9b9',
                'address' => 'Dorsoduro/Accademia, Venezia, Veneto 30123, Italy',
                'latitude' => '45.43517586669314',
                'longitude' => '12.324003875883072',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 3,
                'square_meters' => 861,
                'visibility' => 0,
            ),
            20 => 
            array (
                'title' => 'RIALTO AL MANGANER:WIFI FREE 6 PAX',
                'description' => 'The “Rialto al Manganer” apartment is located on the first floor of a late eighteenth century Venetian Palazzo, just a short walk from the Rialto Bridge and the “Rialto Mercato” water bus stop.  It has recently been renovated with modern, meticulous finishes and is furnished with quality furniture in shades of white, green and dove grey; the floors are covered with elegant parquet. It has a fully equipped kitchen, two double bedrooms (one of which can be provided with 2 single beds), each with a spacious built-in wardrobe, a living-room with a double sofa bed and two modern, elegant bathrooms with showers. For your comfort, the apartment also offers: , Wi-Fi internet connection, air-conditioning and heating, washing machine, hairdryer, toaster, microwave and electric oven, vacuum cleaner and cot (upon request). At the heart of this authentic and popular city, in Rialto, between the picturesque fruit and vegetable market and the characteristic fish market, just a two minute walk from th',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/ffb4461d3431e9d01aa80d3c42811f8c',
                'address' => 'San Polo, Venezia, Veneto 30125, Italy',
                'latitude' => '45.440295841198484',
                'longitude' => '12.332661922594923',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 3,
                'square_meters' => 700,
                'visibility' => 0,
            ),
            21 => 
            array (
                'title' => 'RIALTO SUITE RESIDENCE FOR 10 - 3 BEDR. & 4 BATHR.',
                'description' => 'Two elegants and sophisticated apartments, fully furnished with designer modern style furniture, refined lighting, large windows. .  The Rialto Suite Residence is composed of 2 apartments located on the first floor of a late eighteenth century Venetian Palazzo, just a short walk from the Rialto Bridge and the “Rialto Mercato” water bus stop. It has recently been renovated with modern, meticulous finishes and is furnished with quality furniture.  An apartment can host 6 people and is composed of a fully equipped kitchen, two double bedrooms (one of which can be provided with 2 single beds), each with a spacious built-in wardrobe, a living-room with a double sofa bed and two modern, elegant bathrooms with showers. The second apartment, ideal for 4 people, has a living room with an extremely large and comfortable sofa bed, a fully equipped kitchen, a double bedroom and, the crowning glory of the apartment, two spacious bathrooms.  Location At the heart of this authentic and popular city,',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/ee09a3b41da0facbcd854d745bdde4dd',
                'address' => 'San Polo, Venezia, Veneto 30125, Italy',
                'latitude' => '45.43958927499663',
                'longitude' => '12.332213245736618',
                'rooms' => 3,
                'bathrooms' => 4,
                'beds' => 5,
                'square_meters' => 1292,
                'visibility' => 0,
            ),
            22 => 
            array (
                'title' => 'A nest for two: Domus Venetiae',
                'description' => 'Domus Venetiae sunny apartment is light-colored and relaxing with a fantastic view of the canal of Cannaregio, second in importance only to the Grand Canal. Beautifully restored with materials such as maple and oak, stone and steel, is furnished in a modern and functional way and offers all the amenities necessary for a pleasant stay for guests, plus a few little luxuries like whirlpool with sauna, plasma TV, home-theater and a sophisticated sound system. Washer/dryesr and induction cooker are available. One bedroom with a double bed pus one single bed for children or, alternatively, the third bed moved into the living room. From inside you can go directly to a splendid terrace (not available during July 2017) of 25 square meters overlooking the rooftops of Venice, where a romantic candlelit dinner or organize fun cocktails with friends. Or simply soak up the sun by day and star gazing at night. Venetiae Domus is located in one of the few parts of Venice yet fully experienced by the in',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/cd9524fe2adf7a68db594d444f6cd419',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.44458330365307',
                'longitude' => '12.322246009434643',
                'rooms' => 3,
                'bathrooms' => 1,
                'beds' => 1,
                'square_meters' => 861,
                'visibility' => 0,
            ),
            23 => 
            array (
                'title' => 'Beautiful views on Venice',
                'description' => 'Grittina is located in the historical center of Venice, in the Castello district. It overlooks the Campo Bandiera e Moro and has an exceptional panorama. Grittina is on the top floor of a gothic palace recently restored. The address: castello 3608. The apartment is in campo della Bragora (or Bandiera e Moro). Grittina is a bright and spacious apartment, ideal to accommodate from 4 to 6 people: it has two double bedrooms, plus a sofa bed in the living room. There are two bathrooms (one with tube, one with shower). The kitchen is fully equipped. The roof terrace: An extraordinary terrace above the rooftops! Grittina has “altana” among the highest in the city, from which the eye can range to 360 degrees, including the islands of the lagoon, the entire Venice, the domes of the churches, canals and boats. The roof terrace is furnished with a large umbrella, table and chairs: think of the beauty of having breakfast here; think of an aperitif in the evening … you will feel the masters of the',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/24f3b78f5e5810081758f68b1b1ce1a3',
                'address' => 'Castello, Venezia, Veneto 30122, Italy',
                'latitude' => '45.43628548157858',
                'longitude' => '12.33954665627417',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 6,
                'square_meters' => 1550,
                'visibility' => 0,
            ),
            24 => 
            array (
                'title' => 'Tre terrazze nel cuore di Venezia',
                'description' => 'Appartamento situato a pochi passi dalle chiese dei Miracoli e di San Giovanni e Paolo, a 5 minuti da Rialto e 10 da San Marco,perfetta per cinque ospiti. La terrazza più grande affaccia su di un canale. L\'appartamento è a pochi passi dalle chiese dei Miracoli e di San Giovanni e Paolo, a 5 minuti da Rialto e 10 da San Marco, perfetta per cinque persone, può ospitarne sei. La terrazza più grande affaccia su di un canale, L\'appartamento, in un edificio d\'epoca,   è servito da ascensore e possiede tre terrazze. I bagni e la cucina sono moderni e restaurati di recente, mentre le altre stanze conservano gli arredi originali appartenenti alla mia famiglia. Nell\'appartamento ci sono  tre camere da letto: una matrimoniale, molto spaziosa in tipico stile veneziano, dove si potrebbe mettere anche un letto per un bambino; una con due letti singoli; una più piccola con un letto singolo e un secondo letto all\'occorrenza . Tutte le camere hanno la porta. Ci  sono due bagni entrambi con la finestra',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/31e039d9a6a5c246842e6bb3e19a086c',
                'address' => 'Cannaregio, Venezia, Veneto 30121, Italy',
                'latitude' => '45.44049898161851',
                'longitude' => '12.337038596169066',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 6,
                'square_meters' => 1184,
                'visibility' => 0,
            ),
            25 => 
            array (
                'title' => 'Ca\' Barbaria S. Marco view room',
                'description' => 'Cozy apartment with terraces with panoramic views , a short walk from the main monuments ! Less than 10 minutes from San Marco.',
                'image' => 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/airbnb-listings/files/4ae454fe370f9222b90b95a951bd7e97',
                'address' => 'Castello, Venezia, Veneto 30122, Italy',
                'latitude' => '45.43916053507274',
                'longitude' => '12.344214859211668',
                'rooms' => 3,
                'bathrooms' => 2,
                'beds' => 1,
                'square_meters' => 269,
                'visibility' => 0,
            ),
        ));
    }
}
