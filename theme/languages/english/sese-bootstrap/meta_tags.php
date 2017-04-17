<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2008 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: meta_tags.php 10330 2008-10-10 20:14:32Z drbyte $
 */

// page title
define('TITLE', 'Southern Exposure Seed Exchange');

// Site Tagline
define('SITE_TAGLINE', 'Saving the Past for the Future');

// Custom Keywords
define('CUSTOM_KEYWORDS', 'heirloom seeds, organic seeds, heirloom tomatoes, seed saving, vegetable garden layout, companion planting chart, native gardens, wild flower seeds, vegetable seeds, Asian vegetable seeds, hot pepper seeds, non hybrid seeds, survival seeds, starting tomato seeds indoors, heritage seeds, growing zones in north America, window flower boxes, garden hand tool, greenhouse seed, best vegetable garden, best flowers for garden, best flowers for cutting garden, heirloom flower seeds, perennial flower seeds, perennial seeds, indeterminate tomatoes, heirloom tomato seeds, garlic growing, flower garden seeds, potato seeds, design your own garden, staking tomato plants, tomatoes early, cherry tomato seeds, canning fresh tomatoes, canning tomatoes how to, transplanting tomatoes, mulch types, types of mulch, coffee grounds for plants, herb garden design, indoor herb gardening, how to grow tomatoes from seed, zinnia seeds, tomato disease identification, tomatoes diseases, tomato diseases, tomato pests, tomatoes diseases, tomato worms, pruning tomatoes, watering tomatoes');

// Home Page Only:
  define('HOME_PAGE_META_DESCRIPTION', 'Our Cooperatively-Run Business Offers over 700 Varieties of Heirloom & Organic Garden Seeds.');
  define('HOME_PAGE_META_KEYWORDS', 'heirloom seeds, organic seeds, heirloom tomatoes, seed saving, vegetable garden layout, companion planting chart, native gardens, wild flower seeds, vegetable seeds, Asian vegetable seeds, hot pepper seeds, non hybrid seeds, survival seeds, starting tomato seeds indoors, heritage seeds, growing zones in north America, window flower boxes, garden hand tool, hand garden tools, greenhouse seed, best vegetable garden, best flowers for garden, best flowers for cutting garden, heirloom flower seeds, perennial flower seeds, perennial seeds, indeterminate tomatoes, heirloom tomato seeds, garlic growing, flower garden seeds, potato seeds, design your own garden, designing a garden, staking tomato plants, tomatoes early, cherry tomato seeds, canning fresh tomatoes, canning tomatoes how to, transplanting tomatoes, mulch types, types of mulch, coffee grounds for plants, herb garden design, indoor herb gardening, how to grow tomatoes from seed, zinnia seeds, tomato disease identification, tomato pests, tomatoes diseases, tomato worms, pruning tomatoes, watering tomatoes');

  // NOTE: If HOME_PAGE_TITLE is left blank (default) then TITLE and SITE_TAGLINE will be used instead.
  define('HOME_PAGE_TITLE', ''); // usually best left blank


// EZ-Pages meta-tags.  Follow this pattern for all ez-pages for which you desire custom metatags. Replace the # with ezpage id.
// If you wish to use defaults for any of the 3 items for a given page, simply do not define it.
// (ie: the Title tag is best not set, so that site-wide defaults can be used.)
// repeat pattern as necessary
  define('META_TAG_DESCRIPTION_EZPAGE_#','');
  define('META_TAG_KEYWORDS_EZPAGE_#','');
  define('META_TAG_TITLE_EZPAGE_#', '');

// Per-Page meta-tags. Follow this pattern for individual pages you wish to override. This is useful mainly for additional pages.
// replace "page_name" with the UPPERCASE name of your main_page= value, such as ABOUT_US or SHIPPINGINFO etc.
// repeat pattern as necessary
  define('META_TAG_DESCRIPTION_page_name','');
  define('META_TAG_KEYWORDS_page_name','');
  define('META_TAG_TITLE_page_name', '');

// Review Page can have a lead in:
  define('META_TAGS_REVIEW', 'Reviews: ');

// separators for meta tag definitions
// Define Primary Section Output
  define('PRIMARY_SECTION', ' : ');

// Define Secondary Section Output
  define('SECONDARY_SECTION', ' ');

// Define Tertiary Section Output
  define('TERTIARY_SECTION', ', ');

// Define divider ... usually just a space or a comma plus a space
  define('METATAGS_DIVIDER', ' ');

// Define which pages to tell robots/spiders not to index
// This is generally used for account-management pages or typical SSL pages, and usually doesn't need to be touched.
  define('ROBOTS_PAGES_TO_SKIP','login,logoff,create_account,account,account_edit,account_history,account_history_info,account_newsletters,account_notifications,account_password,address_book,advanced_search,advanced_search_result,checkout_success,checkout_process,checkout_shipping,checkout_payment,checkout_confirmation,cookie_usage,create_account_success,contact_us,download,download_timeout,customers_authorization,down_for_maintenance,password_forgotten,time_out,unsubscribe,info_shopping_cart,popup_image,popup_image_additional,product_reviews_write,ssl_check');


// favicon setting
// There is usually NO need to enable this unless you need to specify a path and/or a different filename
//  define('FAVICON','favicon.ico');

// EZ-PAGE OVERRIDES
//  define('META_TAG_DESCRIPTION_EZPAGE_15', 'Our commitment to seed biodiversity means we have a strict non-GMO policy, preferring open-pollinated varieties.');
//  define('META_TAG_DESCRIPTION_EZPAGE_18', 'We are a worker-owned cooperative offering over 700 varieties of organic, heirloom, & ecologically-grown vegetable, flower, herb, grain, and cover crop seeds.');
//  define('META_TAG_DESCRIPTION_EZPAGE_21', 'Common questions about organic & heirloom seeds, seed-saving, and orders.');
//  define('META_TAG_DESCRIPTION_EZPAGE_40', 'We give workshops and presentations on seed saving, heirloom gardening, and seed growing as a farm enterprise, host seed swaps and variety tastings, & distribute seed saving resources.');
//  define('META_TAG_DESCRIPTION_EZPAGE_41', 'Check out our library of seed-saving and growing guides for vegetables, herbs, flowers, and seasonals.');
//  define('META_TAG_DESCRIPTION_EZPAGE_138', 'We work with Certified Organic, Certified Naturally Grown, and ecologically-oriented farmers through the mid-Atlantic region and beyond.');
  define('META_TAG_DESCRIPTION_EZPAGE_17', "See our interactive map of Southern Exposure seed racks in shops around the country.  Or, browse our state-by-state list.");
  define('META_TAG_DESCRIPTION_EZPAGE_15', "We don't sell GMO varieties, or seed that we know to be contaminated with GMO genes. We fight for the rights to seed-saving and GMO-free food.");
  define('META_TAG_DESCRIPTION_EZPAGE_18', "History, location, product line, seed grower network, business structure, and more information about Southern Exposure Seed Exchange");
  define('META_TAG_DESCRIPTION_EZPAGE_21', "Product Questions; Shipping Questions; General Questions.  Where do your seeds come from?  Where do your seeds grow well? How much of your seed is Organic?");
  define('META_TAG_DESCRIPTION_EZPAGE_24', "General Sustainable Gardening and Farming. Farming and Gardening in Our Region. Seed-Saving. General Sustainability. Gardening with kids. Local Foods.");
  define('META_TAG_DESCRIPTION_EZPAGE_40', "We give workshops & presentations on seed saving, heirloom gardening, and seed growing as a farm enterprise.  We host seed swaps & variety tastings.");
  define('META_TAG_DESCRIPTION_EZPAGE_134', "Twelve crops that are easy to grow by planting directly in your garden.  Including lettuce, peas, radishes, squash, okra, greens, beans,");
  define('META_TAG_DESCRIPTION_EZPAGE_26', "Instructions for drying seed with silica gel.  What is color-indicating silica gel? How to regenerate (re-dry) silica gel.  Safety Precautions.");
  define('META_TAG_DESCRIPTION_EZPAGE_203', "All plants are botanically grouped into families; there are hundreds in total. Most vegetable crops fall into just a few of these.");
  define('META_TAG_DESCRIPTION_EZPAGE_29', "Types of Garlic & Perennial Onions. Soil Prep & Fertility. Planting Dates, Depth & Spacing. Watering & Cultivation. Harvest. Curing. Storage. Pest & Disease Control.");
  define('META_TAG_DESCRIPTION_EZPAGE_32', "Fennel comes to us from the Mediterranean. By nature it is a very hardy, tall, perennial plant that will grow and thrive in almost any sunny situation.");
  define('META_TAG_DESCRIPTION_EZPAGE_33', "This semi-hardy, evergreen, aromatic shrub comes to us  steeped in historical lore by long use through our many cultures");
  define('META_TAG_DESCRIPTION_EZPAGE_34', "Here Jeff McCormack recommends an isolation distance for pepper preservation efforts, & presents considerations involved in determining isolation distance.");
  define('META_TAG_DESCRIPTION_EZPAGE_35', "Tomato isolation requirements may be different for commercial growers than for home gardeners saving their own seed.");
  define('META_TAG_DESCRIPTION_EZPAGE_36', "Sow seed in a light, well-drained soil. Seeds need air as well as water to germinate. Sow no deeper than 3 to 4 times the diameter of the seed");
  define('META_TAG_DESCRIPTION_EZPAGE_37', "by Brett Grohsgal. The key things that you need for successful winter gardening are: Enough light.  Well-drained soil. The right seeds. Reasonable Expectations.");
  define('META_TAG_DESCRIPTION_EZPAGE_38', "Southern Exposure's tips for growing a successful fall and winter garden, using cold-hardy varieties, row covers, cold frames, cover crops, and more");
  define('META_TAG_DESCRIPTION_EZPAGE_41', "Directory of dozens of pages to help you grow a successful garden.  General, crop-specific, seed-saving, and seasonal.");
  define('META_TAG_DESCRIPTION_EZPAGE_42', "Cotton is an annual plant that requires a long, warm growing season. History of naturally colored cottons. ");
  define('META_TAG_DESCRIPTION_EZPAGE_43', "How to grow beans (bush or pole).  Lima beans, snap beans, asparagus beans, fava beans, edamame, drying beans. After last frost, plant snap beans 1 inch deep");
  define('META_TAG_DESCRIPTION_EZPAGE_44', "How to grow beets.  Sow seeds 1/2 inch deep directly in the garden.  An even supply of moisture and absensce of extended periods of hot weather is necessary");
  define('META_TAG_DESCRIPTION_EZPAGE_45', "Hot to grow broccoli.  Start seeds indoors 4-5 weeks before transplanting out. Transplants should have at least 4 leaves. ");
  define('META_TAG_DESCRIPTION_EZPAGE_46', "How to grow brussels sprouts. Sow seed 1/4 to 1/2\" deep in flats or pots in early June. Transplant when several sets of leaves have developed. Northern");
  define('META_TAG_DESCRIPTION_EZPAGE_47', "How to grow cabbage. Early varieties require a higher soil fertility than mid- or late-season varieties. Since members of the cabbage family are shallow-rooted");
  define('META_TAG_DESCRIPTION_EZPAGE_48', "How to grow carrots. For best results, carrots need a loose sandy loam free of rocks. Plant seed 1/4\" deep, 3 seeds per inch, and thin to 1-2\" apart.");
  define('META_TAG_DESCRIPTION_EZPAGE_50', "Growing cauliflower is similar to growing broccoli or cabbage. When the white head or curd begins to form, tie the top leaves together over it");
  define('META_TAG_DESCRIPTION_EZPAGE_51', "Celery and celeriac are moisture-loving, cool-season crops. Sow seed no more than 1/8\" deep. Keep temperature between 70-75 degrees F. Transplant when");
  define('META_TAG_DESCRIPTION_EZPAGE_52', "How to grow corn: sweet corn, grinding corn, popcorn. Sweet corn requires a soil temperature of 65 degrees F to germinate well.  After silk has turned brown,");
  define('META_TAG_DESCRIPTION_EZPAGE_53', "Southern Peas are also called cowpeas, field peas, crowder peas, and black-eyed peas. Sow seed 1 in. deep, 2 in. apart in rows 3-6 ft. apart, thinning to 4 in. ");
  define('META_TAG_DESCRIPTION_EZPAGE_54', "How to grow cucumbers. Plant out starting 1-2 weeks after last frost. Sow 1/2 to 3/4 in. deep. Final spacing should be 6-12 in. apart in rows 3-5 ft. apart.");
  define('META_TAG_DESCRIPTION_EZPAGE_55', "How to grow eggplants. Start seeds 8-10 weeks before setting outside, set out 1-2 weeks after your last frost-free date. Keep well picked");
  define('META_TAG_DESCRIPTION_EZPAGE_56', "Types of garlic. Plant at the right time in the fall.  Plant unpeeled cloves root side down at a proper depth. Mulch thickly. Harvest when the lower 1/3 of");
  define('META_TAG_DESCRIPTION_EZPAGE_57', "Growing gourds is similar to growing squash. Harvest ornamental gourds when the fruit stem changes from green to yellow or yellow-brown. Leave 4 in. of stem");
  define('META_TAG_DESCRIPTION_EZPAGE_58', "Growing husk tomatoes (ground cherries and tomatillos) is similar to growing tomatoes. Husk tomatoes have papery husks (calyxes) that cover the maturing fruits.");
  define('META_TAG_DESCRIPTION_EZPAGE_59', "Kohlrabi is grown for its bulbous stem which can be eaten raw or cooked. Grow kohlrabi in spring or fall; it does best in cool weather. Plant seeds 1/4 in. deep");
  define('META_TAG_DESCRIPTION_EZPAGE_60', "Growing leeks is similar to growing onions but easier in some ways. Sow seed 10-12 weeks before setting out transplants 2-6\" apart in rows 18\" apart.");
  define('META_TAG_DESCRIPTION_EZPAGE_61', "Early spring lettuce plantings should started a month before setting outdoors. Later plantings can be direct-seeded. Sow seed 1/4\" deep and thin to 10-16\" apart");
  define('META_TAG_DESCRIPTION_EZPAGE_62', "Melons have delicate root systems, so direct sow or start seed in pots, not flats. Sow 1/2 in. deep. Space plants 12-18\" apart in rows 5-6' apart.");
  define('META_TAG_DESCRIPTION_EZPAGE_63', "Okra originated in northeast Africa. Sow 3/4-1 in. deep and thin to 18 in. apart in rows 5-6 ft. apart. Seed may be slow to germinate. To speed germination, ");
  define('META_TAG_DESCRIPTION_EZPAGE_66', "Sow parsnips in spring as soon as soil can be worked. Seeds may take 2-3 weeks to germinate. A heavy frost may be necessary for full flavor development.");
  define('META_TAG_DESCRIPTION_EZPAGE_67', "Sow peanuts 1-2 in. deep, 6-12 in. apart, in rows 30-36 in. apart in loose, well-drained soil. Harvest during an October dry spell, or just after a light frost.");
  define('META_TAG_DESCRIPTION_EZPAGE_69', "How to grow peas. Types of peas. Peas are a fast-maturing cool-weather crop. Sow 1\" deep, 1/2-1\" apart in double rows 4\" apart. Thin to 2\" apart. ");
  define('META_TAG_DESCRIPTION_EZPAGE_70', "Sow seeds 8-10 weeks before the last frost. Plant seeds 1/4 in. deep in well-drained flats. Soil should be at least 75-85 degrees F during germination.");
  define('META_TAG_DESCRIPTION_EZPAGE_71', "Cut potatoes into pieces no smaller than an egg with no fewer than 2 eyes. Plant at 12 in. spacing, rows 3-4 ft. apart, in rich soil. When plants are 6 in. high");
  define('META_TAG_DESCRIPTION_EZPAGE_73', "Sow winter radishes 5-10 weeks before first fall frost. Sow spring (salad) radishes in the spring as soon as the soil can be worked. Successive sowings can be");
  define('META_TAG_DESCRIPTION_EZPAGE_78', "Zucchini and Pumpkins are types of squash. Sow seeds 1/2 to 1 in. deep. Flowers may not set fruit in exceptionally hot weather. The 4 common species of squash");
  define('META_TAG_DESCRIPTION_EZPAGE_80', "Turnip plantings can be made in the spring and at summer's end. Sow seeds 1/4\" deep and thin to 2-4\" apart, rows 10-12\" apart. Best-quality roots");
  define('META_TAG_DESCRIPTION_EZPAGE_81', "How to grow watermelons. Space 12-18 in. apart in rows 6-8 ft. apart. Don't disturb vines while fruit is ripening or else fruit may ripen unevenly.");
  define('META_TAG_DESCRIPTION_EZPAGE_130', "Some of our favorite tomato varieties for disease resistance, earliness, and storage.");
  define('META_TAG_DESCRIPTION_EZPAGE_133', "Rice does not need to be flooded. Flooding is used for weed control. Amaranth seedheads mature unevenly. Sorghum seed is mature for harvest when the stalk has");
  define('META_TAG_DESCRIPTION_EZPAGE_99', "Sow seeds indoors or in the greenhouse, 1/4 in. deep, any time from mid-September through mid-March. Earlier sowing means larger bulbs because ");
  define('META_TAG_DESCRIPTION_EZPAGE_100', "Multiplier onions produce a cluster of bulbs at ground level from a single planted bulb. Eat the larger bulbs from your harvest, and replant the smaller ones.");
  define('META_TAG_DESCRIPTION_EZPAGE_129', "Plant rutabaga 8-10 weeks before first fall frost, seeding 1\" apart in rows 12-16\" apart, thinning to 8\" apart. Thin within a month. Crowded seedlings won't");
  define('META_TAG_DESCRIPTION_EZPAGE_119', "Plant seed 1/4 in. deep and maintain soil temperature of 75-85 degrees F for good germination. When seedlings have produced several leaves, transplant to");
  define('META_TAG_DESCRIPTION_EZPAGE_131', "How to grow arugula, chinese cabbage, collards, cress, kale, mustard greens, parsley, spinach, and swiss chard. These crops do best in cool weather.");
  define('META_TAG_DESCRIPTION_EZPAGE_136', "Twin Oaks Community Seeds grows more varieties for Southern Exposure than any other farm.   Four separate gardens totaling nearly four acres");
  define('META_TAG_DESCRIPTION_EZPAGE_137', "Living Energy Farm (LEF) is creating an intentional community, educational center, & demonstration farm to operate without any fossil fuel.");
  define('META_TAG_DESCRIPTION_EZPAGE_138', "We're proud to work with over 50 small farmers who grow seeds for us, and always happy to talk to farmers who want diversify their income streams & grow seeds.");
  define('META_TAG_DESCRIPTION_EZPAGE_140', "There are varios ways you can make a difference in keeping GMOs from taking over our food supply.");
  define('META_TAG_DESCRIPTION_EZPAGE_142', "Most seeds will store 2-4 years if clean, cool, dry, & out of light. Freshly harvested seeds need to dry for several weeks before being stored. For long-term");
  define('META_TAG_DESCRIPTION_EZPAGE_145', "The 1st year's inventory fit in their hall closet. 1,700 copies of the 1983 catalog went out, listing 65 varieties, and 196 orders came in that first year.");
  define('META_TAG_DESCRIPTION_EZPAGE_190', "An illustrated listing. Nightshades. Legumes. Cucurbits. Brassicas. Asters. Grasses. Umbels. And more.");
  define('META_TAG_DESCRIPTION_EZPAGE_146', "Seed swaps are a rewarding way to build community and share information about gardening, plant varieties, and each others' projects");
  define('META_TAG_DESCRIPTION_EZPAGE_153', "Our guide to choosing the right varieties, for temperate climate gardeners who want real Southern flavor. Cover 7 crops.");
  define('META_TAG_DESCRIPTION_EZPAGE_152', "This guide covers the basics of seed-starting.  Make a Garden Plan. Test your soil.  Sowing seeds. Amend your soil. Prepare the ground. Transplanting outdoors.");
  define('META_TAG_DESCRIPTION_EZPAGE_154', "Some plants continue producing even during periods of extreme heat and humidity or heat and drought. Here are some of our recommendations for 9 crops.");
  define('META_TAG_DESCRIPTION_EZPAGE_162', "The idea of a germination test is to put a random sample from your seed lot in the conditions that make them most likely to germinate, and see");
  define('META_TAG_DESCRIPTION_EZPAGE_163', "Slips are vine cuttings from sprouted sweet potatoes. Plant slips very soon after they arrive, but wait for warm, settled weather before planting outside.");
  define('META_TAG_DESCRIPTION_EZPAGE_164', "To help meet demand for emergency food, and to provide high-quality, nutritious food to our community, several organizations started a chapter Plant a Row for");
  define('META_TAG_DESCRIPTION_EZPAGE_169', "Southern Exposure supports sustainable agriculture in over a dozen distinct ways, including presentations, donation, serving on boards, conference sponsorship. ");
  define('META_TAG_DESCRIPTION_EZPAGE_171', "Clifton Slade is a third  generation farmer and part-time extension agent with Virginia State University.  He started growing seed in 2011 as");
  define('META_TAG_DESCRIPTION_EZPAGE_172', "Rehoboth Farm is truly a family affair. Four generations of Smythes live on the family's Southwest Virginia land, including a family  of fourteen and");
  define('META_TAG_DESCRIPTION_EZPAGE_173', "When Elizabeth Malayter & her partner were transitioning to full-time farming, they figured seed saving would help diversify their incom, especially in winter.");
  define('META_TAG_DESCRIPTION_EZPAGE_174', "Rodger Winn has been a seed saver and avid gardener since childhood. He is especially passionate about beans, & has vivid memories of visiting his grandmother");
  define('META_TAG_DESCRIPTION_EZPAGE_175', "The Berea College Farm, comprising 100 acres of row crops, 200 acres of hay and silage and 180 acres of pasture land, has been providing SESE with organic seed");
  define('META_TAG_DESCRIPTION_EZPAGE_176', "Richard Moyer and family tend one of the most diverse farms around Castlewood, VA. They grow organic vegetables and fruits. They raise");
  define('META_TAG_DESCRIPTION_EZPAGE_177', "Thorough instructions and photos for the beginning seed-saver. An easy crop for saving seeds. Outline: Isolate, Pick, Mash or blend, pour off, dry, store.");
  define('META_TAG_DESCRIPTION_EZPAGE_184', "This list is based primarily on gardening in central Virginia, where we're All the crops on it are suitable for sowing directly into your garden. Some are also");
  define('META_TAG_DESCRIPTION_EZPAGE_180', "Be careful to keep your soil moist while the seeds are germinating in summer. It's best to have young plants where they'll get shade relief during the afternoon");
  define('META_TAG_DESCRIPTION_EZPAGE_185', "Carbon-rich soils are more resilient to dry conditions as well as wet. Cover crops increase the carbon content of soils through root growth, root sloughing, &");
  define('META_TAG_DESCRIPTION_EZPAGE_186', "We think of biodiversity on three levels: genetic, species, and ecosystem. All three apply to your garden or farm, no matter its scale.");
  define('META_TAG_DESCRIPTION_EZPAGE_187', "In late spring we direct sow corn, snap beans, zucchini, summer squash, winter squash, and pumpkins. In mid-May, when the weather has really settled, we sow ");
  define('META_TAG_DESCRIPTION_EZPAGE_188', "Where summers are hot, humid, and long, smart gardeners don't sow warm-season crops just once: we keep our kitchens supplied all summer");
  define('META_TAG_DESCRIPTION_EZPAGE_191', "Beth Shelley and her family grow a wide range of vegetables in two huge old greenhouses in Bent Mountain, VA.");
  define('META_TAG_DESCRIPTION_EZPAGE_193', "Ann Shrader, in Floyd, Virginia, grows a home garden of no more than a quarter acre where her biggest crops are the seed crops");
  define('META_TAG_DESCRIPTION_EZPAGE_194', "Monica Williams, Bill Whipple, and their young son Gabriel divide their time between Asheville, NC, and the remote West Virginia farm a ways down a one-lane");
  define('META_TAG_DESCRIPTION_EZPAGE_195', "Troy Teets and his family grow seed for Southern Exposure and raise goats, pigs, and geese on their farm in Riceville, TN.");
  define('META_TAG_DESCRIPTION_EZPAGE_196', "Tim Miller uses dryland farming techniques rather than further deplete Texas's aquifers. Hardy heirloom varieties are central to minimizing his water needs");
  define('META_TAG_DESCRIPTION_EZPAGE_197', "Susan Vidal and her husband Dean operate Brightwood Vineyard and Farm in north central Virginia. They earn money through their winery, bed and breakfast,");
  define('META_TAG_DESCRIPTION_EZPAGE_198', "Tony West is passionate about tracking down and preserving rare heirloom seed varieties. One of his successes is Cherokee White Flour corn");
  define('META_TAG_DESCRIPTION_EZPAGE_199', " When he was in his mid-40s, Steve Florin and his wife Patricia moved to their 18-acre farm in Williams in southern Oregon, and Steve started");
  define('META_TAG_DESCRIPTION_EZPAGE_200', "Farmer Nick Maravell is a long time advocate for organic farming, promoting its needs and conducting on-farm research in cooperation with USDA and MD extension");
  define('META_TAG_DESCRIPTION_EZPAGE_201', "Tim Fields and his wife Norma have 14 acres in Grand Bay, Alabama, in the SW corner, a dozen miles north of the Gulf. Tim grew up nearby on his family's farm");
  define('META_TAG_DESCRIPTION_EZPAGE_202', "Barbara Rosholdt lives in Louisa, Virginia, 5 miles from SESE's own farm. She and her husband Erling live in an innovative, energy-efficient home");
  define('META_TAG_DESCRIPTION_EZPAGE_204', "Choose varieties for cold-hardiness.  This information is based on zone 7a (winter low ~0°F) in central Virginia. Our first frost occurs around Oct. 15th.");
  define('META_TAG_DESCRIPTION_EZPAGE_205', "Using mushroom plug spawn is easy. It can be hammered into logs for growing many woodland mushrooms. Logs cut from healthy live dormant trees work best. Cut");
  define('META_TAG_DESCRIPTION_EZPAGE_207', "In Hurricane, WV, Julie Schaer has a 1 1/2 acre garden on land that has been in her family for many generations. Her husband Nick and their two young children");
  define('META_TAG_DESCRIPTION_EZPAGE_208', "Susana Lein started Salamander Springs Farm in 2001 by clearing 7 acres of degraded ridgetop meadow on 23 acres in the Appalachians south of Berea, Kentucky");
  define('META_TAG_DESCRIPTION_EZPAGE_209', "Megan Allen and her husband Eduardo \"Lalo\" Lazaro cultivate 7 acres of vegetables and 7 acres of cover crops on Care of the Earth Community Farm and CSA");
?>
