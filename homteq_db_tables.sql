CREATE TABLE Product (
  prodId            INT(4) NOT NULL AUTO_INCREMENT,
  prodName          VARCHAR(30) Unique NOT NULL,
  prodPicNameSmall  VARCHAR(100) NOT NULL,
  prodPicNameLarge  VARCHAR(100) NOT NULL,
  prodDescripShort  VARCHAR(1000),
  prodDescripLong   VARCHAR(3000),
  prodPrice         DECIMAL(6,2) NOT NULL,
  prodQuantity      INT(4) NOT NULL,
  CONSTRAINT pr_PID_pk PRIMARY KEY (prodId)
)ENGINE=INNODB;

INSERT INTO Product  (prodName,prodPicNameSmall,prodPicNameLarge,
                      prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES ("Withings/NOKIA Steel HR 40mm",
        "steel-hr-40small.jpg",
        "steel-hr-40large.jpg",
        "Steel HR is a high-quality hybrid smartwatch crafted with 316L stainless
         steel",
        "Steel HR is a high-quality hybrid smartwatch crafted with 316L stainless
         steel that moves with you - office, gym, pool, and everywhere in between.
         It features HR monitoring 24/7, multisport tracking, connected GPS and
         sleep tracking. Steel HR will go the distance with a long-life
         rechargeable battery that lasts up to 25 days and water resistance up
         to 50 meters.",
        169.95,
        15
);

INSERT INTO Product  (prodName,prodPicNameSmall,prodPicNameLarge,
                      prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES ("Apple Homepod",
        "AppleHomepodSmall.jpg",
        "AppleHomepodLarge.jpg",
        "HomePod is a breakthrough speaker that senses its location and tunes the
         music to sound amazing wherever you are in the room. Together with
         Apple Music, it gives you access to over 45 million songs. And with
         the intelligence of Siri, it's a helpful home assistant for everyday
         tasks, and for controlling your smart home accessories; all with just
         your voice. Welcome HomePod.",

        "HomePod is a breakthrough speaker that senses its location and tunes
        the music to sound amazing wherever you are in the room. Together with
        Apple Music, it gives you access to over 45 million songs. And with the
        intelligence of Siri, it's a helpful home assistant for everyday tasks,
        and for controlling your smart home accessories; all with just your
        voice. Welcome HomePod.
        Audio by Apple
        With a precision-designed speaker system, Apple audio tech and advanced
        software powered by Apple's A8 chip, you'll get supreme sound wherever
        you place it. Bass is deep and rich while mids and trebles are
        brilliantly detailed. It senses its location and optimises settings
        for amazing, immersive audio wherever you are in the room. The HomePod
        sound rocks the house.
        Apple Music & Easy Streaming
        With Apple Music (subscription required) you have access to over
        45 million songs, virtually every song you could think of. And by voice
        interacting with Siri, it learns your tastes and can help you discover
        great new music. Friends connected to your Wi Fi network can stream
        their music straight to your HomePod. And you can also AirPlay other
        content from iPhone, iPad, iPod touch, Apple TV and Mac.
        'Hey Siri, play 90s hip-hop'
        'Hey Siri, play TED Talks Daily podcast'",
        279.00,
        15
);

INSERT INTO Product  (prodName,prodPicNameSmall,prodPicNameLarge,
                      prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES ("Apple TV 4K",
        "AppleTVSmall.jpg",
        "AppleTVLarge.jpg",
        "Apple TV 4K lets you ask your device to play what you want, when you
        want it - all in beautiful 4K and HDR, to help you to make the most of
        your 4K, HDR enabled television. Keeping its stylish, compact design
        and handy Siri Remote, Apple TV 4K turns your favourite apps into the
        entertainment channels on your television set, to make it as personal
        as your iPhone or iPad.",
        "Apple TV 4K lets you ask your device to play what you want, when you
        want it - all in beautiful 4K and HDR, to help you to make the most of
        your 4K, HDR enabled television. Keeping its stylish, compact design
        and handy Siri Remote, Apple TV 4K turns your favourite apps into the
        entertainment channels on your television set, to make it as personal
        as your iPhone or iPad.",
        179.00,
        15
);

INSERT INTO Product  (prodName,prodPicNameSmall,prodPicNameLarge,
                      prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES ("",
        "",
        "",
        ,
        ,
        00.00,
        15
);

INSERT INTO Product  (prodName,prodPicNameSmall,prodPicNameLarge,
                      prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES (,
        ,
        ,
        ,
        ,
        00.00,
        15
);

INSERT INTO Product  (prodName,prodPicNameSmall,prodPicNameLarge,
                      prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
VALUES (,
        ,
        ,
        ,
        ,
        00.00,
        15
);
