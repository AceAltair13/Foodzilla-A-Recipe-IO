-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 05:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodzilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE `friendlist` (
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `name` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `ingredients` text NOT NULL,
  `method` text NOT NULL,
  `ownerid` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`name`, `image`, `ingredients`, `method`, `ownerid`, `rid`) VALUES
('Paneer Pakoda', 0xffd8ffe000104a46494600010100000100010000ffdb008400090909181718221a1a222225272523271f272123252628251e1e252025272027201f252225222222201f221f1f2525271f2225201d251f1f1f201d22251f251d010805061112111312121212121415161616121515151517171615151517171715171517171717181717171715151f1717181d1d1d1d15152125211d25171d1d1dffc000110800c2010303012200021101031101ffc4001c0000010501010100000000000000000000050002030406010708ffc4003d100001030105040903030400060300000001000211030421314151051261710613228191a1b1d1f032c1f15262e11415234207334372b2d28292e2ffc4001a010002030101000000000000000000000001040203050006ffc40031110001030302050303030501010000000001000211030421123105415161811371912232a1b1c1d1144252e1f0f115ffda000c03010002110311003f001dba573b4ba2a04e1538af29a4af4529a2534929fd6f14c3538ae2d28829a494d93c54ada8ed429bac7705d0519558542b86d1c5aac805d76ec93740ccadd6cae88b000fae0138ee643fee399e1873575adab9e600f73d1557372d6093e02c56cfb1d5b41ff1b4b86a3e91ff00c8dcb5d65e88ba3fc8f03836f3e2602dc5cd10d1006005c077288b969d2e14c1bcbbf0165d7e2af3b4347e503a7d1ab3b71de3ccc7a00a7fecb66fd1e24fbabceaaabbaaa6596b4c6cd6fc255d74ff00f23f2aabb62594ff00d3f02ef7552a7472cc70de6f7cfa8fbabe6b2aff00d4920eef2bee12854b7a7cdadf85ccbb78fee3f28357e893bfe9b9aee0441fb8f459ab66ce752315184718b8f222e5e8d46b8224792b42b488304686f4b55e14c39692df384d50e2ce1bc1fc15e3ee14fe051ff8b8af42da1d18a753b54bb27f4ffa9e5a7a7258aadb3f7496ba4118821665d5b399f74f62365ab6b74d7edf1cd576d3a47553752c5d6d940ccf8294363f09673d31099fd38565b666c270784e6b8286a2816ae0a4d5d635b984f738714d074f451714405286b726a78a7fb135b59ca5fea5fa28ae2a6a6cfd8a46b63fd07885136abbf4a76f1fd250282b2c3fb4295af3fa42acca9191f052f5e78f82e0a0427cdf7801580f6f054cbc1c41f0520a800cfc110507355beb9ba24ab6ff003f05c4650d1eeb1aea21405838ad59a5478a63a8d1e29e2a90f598ea82e750169fa9a3c537a8a3c5025483d6745993fa83aad08a34b52acd936753a8e0049bc4e9c5498d93032a2fad193b231d18d8c18deb9ff51fa7f6b75e67c82d638aec45c816dbdb4cb33379d79c9b993f61a95bf49818d8e9bf72b12e2a97124abf68b4b5825c40e68157e905069237a634e5f75e736cda6faaedf7de49ecb670ba6e1310071bc941bae992270e71a6304fd92956f1c7681eeab016dad3d29110d691ccebc90a6f4a5ed81ba034022264e174f920155e2003dc673e1a5d799e57a8df481120cebcf24aeb70392510b434ba4f54e2019c89fe115a5d2461ec54ec13703ec723cd60c022479a6da86f0ccfcf99ab69d63b4e1710bd3ed3b7a85001ae2674179e67e5eaeec9b7758c2f9904dc756eb195f372f16232be67c958a16c7d1fa1ce1c8fdb05736a9c76d90d2be80a75136d9b369da443ae70c1c31efd42f36d8bd257078656748746e98e7718ccfaaf4aa15b30996b9af104785d4de5a6418582da1b16bd1bfea6fea1f7197cbd0adc7af65a9aeab396ee8fd3a9da6764e991f659b7bc2b9b33dbf85af67c5393fe7f95816d37ea9e29bd1d76c4736e31e69bfda5dfb7c565bda46223c2d0159bd50a14de9ae2f08eb7643b878a7ff6971d3c54349e88faadea8182f52073d1bfeceee1e2bbfd99df0a1e99e8bbd76f5425bbfaaeefbd153b21df0aeff6977c2b8d33d177acdea10c155ea46d676a887f697e5eab83663f4f340d33d170a8dea152eb5ca46d57abdfdb5eb82c0ed147d33d0ae355bd42abd7392443fa2768923e91e8a3ea8ecb28faa75519aa755c254942ccfa8618278e43995a4d64ec93739446a1d54d67b3d4a9f4f8e5e28f59761b5b7bcc9d32fe51a6b00b8276870d9cbb1d9295b8847db9ee83d9764817bcc9d32fe51eb234070e6990a46dc653f46835bb0848d5aee71c9945ed15830171c812bc1b6aed075a2abaa1376006817ac74aab96d95ee198039491f65e2bd646094e20ecc2e0ad1a2d2d06646035bb1bb11f31550c6bc235566956185c247db5cbef826da05c2ff3cbbbef924e51506e837a73ea11d91cc91cb55c10e175d96389d782b2db39177a91971f0375e7440ffc1704c654ed0bb1306fb87c2b8f6c902624f8719c38a63a7e92622f3399d4eba44a659ad579b816eae19e8784ddc510ce71b2e52da696181439f4fb5773e5c0a30cbd840cc9384968bb0be0f8e02ee316e0690e8c4660ee93989231ee1187152a4e2b909b65534dcd6e6d339e33217b46c2da1d752dfc24991a2f13b53b79f37fb0d3905e8bd0db4ff8dccd1dea9db7304041e17ac32f604c4e73853a637881992563b69ed5350eeb3e9d733fc7c2acbdbb6b049f015f696a5e60792b5355f4dc21c5b1cc79159b7d94b817d1ed3418e3dda8e3e4811b16f1179e4885301b1bb2238905615d7166bf7679073fa2d7a1c3b4ece3ec46139b58e9e69c2d074f355eb3a4c9f1d540c20e09765607657bed8812511fea3e4a775e50f0d52b4152d4a1e9aba2d053c572a8354c014250d015a155da2b0d7bb454838a90542b90215c6d57689dd71ca554159df0291b50a209512d53f5ce4945bce491d450d2152b2f4700bea99fda30ef28d0a61a21a001a057ab154dcbd3d1a0d6ec161d5ac5c72546ba124e0ac502bb09c024bab9454952932a31d4aa096b841f71c46238af22dadb11d65a9bae12d3f4bc0b9c38e40ea3bc5d7af5c5d7eebda59500734e20aa2e6803efc94d857849a5fa7e4e988c72540b5fbd2e0605df3cd7a56dae895489b310e64ef1a67ea9022eff00574881803ce4ac539aea4771c1cd26e7088818de0df71811a2ce7d32d3912a6859a8e608899c0ce9a8f7ee57ecb6cdefda45e0913184ee88c4c5d7c013332a85591d9eff009c176ce7104c104728cf899ba232928ee3010446cafb8890241bcfe0df97a2653a54c4824dd81d0c7648bf19e185e9d6473261de73139617df808ef9cec57a2d149a41be743de26f10046277a7fd7122acf5fcae43281dda937f77fea22795d7de95aeb9976e48612406924c0bb5c7e68aed27b778ef989c0fe9e24673863744a114acafaaedca6d73c9383449eff753a049ff0048c2a64af5cff87fb19db86b3c434996cffb40c794cc6a545b07fe1f86c54b59e229033ffddc3d0779c96eebed6a43b0dc860dc0682eb869c138d86e5c4052a7489c004aca7486d9d6572d06e6c08ca71f1bd0d69831f38a11fe50f79aa21ce25e7bce474c94946b4b812b0afaa1739c57a4b3a30d03a0fca366b9de0d0399d3f957594f7b0039e680b2d1da4528dac36f2930c8230af7d230ac5a2cdf4df17f77c2add9ec2710077e0751fcf7850d1b654a86e6eeb79a2f67a85c0c1b81f157362476da1575dce0d831dfca86d3b2481bd4ef18c663dd0e0d5b0b348689c62f515ab6736a5e2e3e479fbad6b8e1b2039b83125bfc2c7a37d061db723fcaca109cd95355b3161875c5343566b9a418384f35e0ec9c0291a9a13f725040aeef04e091a2bada2a402892bb0124fea9246109456b2aa55cac1532bd52f3e9a9c1702eae44a72721169db14d863ea39c45ddfec86d5e901221800339dfddcf54bd6be637772ba9593ddb05ab559ef84059b4eb9176e728fe5415f6b548ed341fdcdba3b8e23bc2a8713a6713f8567ff3ea0e5f95a3156302bb5aa32a08aac6bc7ee03c8e4b3365db0c75c6e3a1450570add73b19502c23710aad6e8cd89e2007b38b4cc72de98f1431fd09648753b4411312cbc4f107ed7648e75ca2a968812a8a85a390fd149b427aa10ee854b037ada57190e0d20c44418378cc4e07995da7d09608dfb40bb26b3dddf65605acbb0b872bd58ea89c1c75bff0b3ebf11a7301b3e4c27697073124c2ed3e8ed869fd5bf5399807b9b1f7453fba53a0c8a6d6d36fed007e4a1b240bef1397fa9e234c100db163755fa244112d3810731cb452b6e2636d21a7947f2a4fe171dc0dd33687499ef98240f341ec56a79797024977c37215696c54dc9fa4c1e79ab0cb78a52041e26447a98e58a85704ccc927f0b42d8340100755e90da2daf4c0781e53dc42cd6d0d8d528ded973758bc731f71df09bb2b6c39d5374dfc5b84cde7915b165b1b375fcaf22120e696920a9879196c195e66cb441b918d9b4fad712f3d919039c7246769747a9571bcd9613fa70278b6e8ee84cd9bb29d4fb0708996ccbbc448f90a551c34e37fd95cdbadf97eaaf0de6b7b17c642f2adece739b26a47068b80e7a9e1e32a165a580eeb37a75c679a65b6d574006fc6ef3e696a2ed26672a9ab2efa6307e51c66dca73072c7823b66acd709695e7d66a0f3208c7519691a7c95a1a2c86e9f65ab6bc59e3701c3e0a46f786b07da483f2169ab516bc6ebaffb2ceda7663d978323d39a9e83f74e39c9d51b656045c9d696570646970dbac7ee933aa91c647e1648517705236ceee08e5a6c737b31d3d90875670b8fa2cdb8b52c3f5782364dd1afab6f85cea1da04e0c769e699fd61e1e0936dbcbc15648eeacd27a052f56ed12485b392ea3a87fc17693d117a8d943ded8446a3e152a9502f50bcfaaeb1fb6add55ce2ca6600307579cc4e4d1e7ca16bb7961eb0873813813f3c123c62bb9ad11cce4a7784510e719cc6ca1a6d832627323edf653f539899d555a86e17ab546b40bd79ca9279adf0d856281dd30549568626557a6f68327be4fa79a7bed20831c0c4cfcc8a34299e7b215067084daec94c02e71bb51022e98f9c909b2ed12d07ab7122600765e73828b6f558a7ba6ebcc8d4acfecf7dc7fee8e380c169db30e99931d15159ad988cad99b755740de9f4ee18a27667b8c1249bfe73fb21fb36c4e6f69e609ba2f3e62e93cd1b7b776ef459f7ef130d4cd018cc05768bc4f09f9e0899702841a5202bb66a64149b7752a8044cabae322e9f7503ecfbc08c0c62386088800282a3463e6990d3ba5c3fc2f08da734eb3c1c77893ccdff743e93cbdd056e7a6bb09fbc6d0cbdb003a311c788f4e4b0f616ef3c346663c6e5b941e0b35738cf63cd513f547295e8bb1eced6306a402799bfbd69a9b40008c670007ae28436cfba009bf4f7f6579a08c3f0bcedcd525c4ceeb45948422d667ef3b31072289b5f06f83e37a17641179ef44e9907c575b38f5ccf34b5c813d906b707d374d3a62313ac690a98b5c980224cdf8ff000b521f7c1f85657a4355ad66fe61c0797b2bfd3cf728d076c23ca2946d5300dc42bdd7eec933eb3f3c962acbb4274fbad1d0aa5e2096df87cf9e68b26611ab442759adfbe60820998bb2171bd13a448bc183ebcf5086baced63b7c0bf0f1e1c54bfd4c5c6e1f757cc6763ca156f6cec31cd6aecd68de13e3cd3ed3656d417e3afcc554b137b33aa22c5bb6df5b06b13232b12b1d2e3a71070b3169b2965c7f2aab2808c82d9d4a61c21c242cf5aac05978bc7a735997fc38b72dcb7f213d677b38383faaa1d40d524f09242539956ab5a0aa86a92afdb2cd98424dcbd595e6e1590e587da760ad4897921cd271c1d7ea30f02b60d7a03d2204b2209b8c11938eba88f34af11602dca6f85d421f8e7bace8b5838279b52cd6ceb33cbf704dd394cc60acb9d50180275bcac9ab662707e56dd2b8e51b2276cda6e0d73445e3cb5d6ec508a56e8c7f88fe574d95cec80eff001509b0b3324f97dbeea4da4c8827e14c547721f285ed2b517ba11ce8d59441738e26ebb031926536359f440d6e327bef255b6573bb18dfdf7fb2b2b551a343411dd534e89d7a9c47b2d532b34b60df89038e5e2ae175d2709859db29ed038461de64f9c95a1b3d7deb9d171cb3d0acaad4e138f6e27e5106ab546a03aaa8092644472f3f815fdd8c3cb92ac6f84bf656a9bee284592b96cb5daab25e437e63c354343817170527bb6ecaca0cc1ee8e9dd2dbefe0bc968d8298b7bbabb98c1bd1a13740ef2b5bb5b6bb6930eb177cf97a09b1ac8e6873ddf53e0927fd4643df8a668d421ae23008d20753fe90f4369eb3e168e9b6e04817f8abaca645d8f2d1557d884c1bf97d95bb1d2635b79ca2fd787924bd29f7527bfe14a2a86e7efe0ae8b4344637940596806a0e19e9ee895941798bc41ee3ac7038a9531083d839f94780eccf7af33e97547970fd04dc3f7018f1906eef5e95508dcf982f29e95da5d34d98c02e2759303c00f34ed112f03b25eddd127bace35c5a41f92b67b1eb178825642cac350ee8049d2256b3666ca7b082eec8e630f346f31be1394aa820ecb542cce7476a23357ec9b0b7aa07bc0dd1371ff63ac6937df8a9ecb55a2204f7c788857bfb83cc801b777fdd4accd31f53dd279000fe567dd56a87e96881cca2e1aa66841d96e78c403ae47bb2f44569550e1216dda5d31ff69fd96457a0e6eff2a44924932aa54dd6061337aeab692a0d9b3fc47c2b3fa877f9143e9d40f085daac5985e7bb2fa665af02a34069c489ec9d60e5aaf57a359b51a0820c89046047053a15750efcc217144b4c72e45651cc21777d1cb4d9c214ea4066890ab0ab52b3b01de0003aac65a2b8a955fba0000c488870d709937f9715baa9bbba40c60fa2c053a71de20f71f5e690e2d520011bfecb4783d3924ce534802600f0cbe73c5513491bdd180545f7e786016482b66550ab64cb863a72f97aad48966e83ca7e70f3445e2f8d73d150a941999933dfdcaea6fc6762a04651ca6e0440bfd679a2341f18f9dcb294dc5a403cc1f99a334dd709f0e494ad4d5e1d85abb25a700ac5a6b5e20f31af72ce59ad01b84f19459db8e04833ea12f3185034f329b52dad691381ecce872ee3eb72a75ad3b80971809d5774b786609beebfcbcf45e75b6f6c758626e1773e298b4b6f51c00911f7151ad58301279ec147b43693ad3581384803485bab3556c1bc7cd325e4f48171bae47ac159d4ae382d3bfb41a406e34f24b5a5726679fe2392f4cb34cc9f19c0299f68c403f3f9591a3b50eb7230cae5c7106f9d0f8ac9a8c8dd3469999c220776e8b8e67e68afd92d703e5eb1e6d4e6b8b4de2f56996e333ae5ecab782adf4f1056d6a56240392f35da35da1ce73efed1bbbf25b0b2d4352e1f88e3c563b6a3002e691078ea9de1d924fb0ee94b864437bcaab67da7886b40d00cff0028cd97693c101d1a5f80e470596b3d23bd033bbb96e6c1b325bd98062ecbbce313f85d72d6a6b58032023167b5070037afe23e1f328ad99a0117e57f1fca0d46ca4719c6e0add3a5bbafce09361caaaab41d8ad031e48bd5dd9efc477a034aa3a2ef3576c75c1aa26e3107429fb1a90f69ef07d9237747e977cfc2d1ca9028d39abd134ac62139249252417cb8b5dd19e929b390ca93d59cff0041d47edd4778599753dd1c54604959ccab190b5aa5291057d0af70a8d90664482330b3f5e9905623a37d24340f5753fe5ce3fa0f0fdba8ef0bd42ad36bdb220cdf23309ca750382cbaf44b4c1db91400142edec0d21c0626f46aa5285139b220aaaf28ea691f0acb4ada5c0fcace3a8e04734c1669d6fd7dd5f14cb6e988f30a769bb2e5ae8bcf1690482b74559008f084bace1a4678f747a7df243ed9446406849d338e21681ce982394478774fd951b6d0cfe7c2a5ad013cd636d749cd6c34cc792b561b6b837b78e00ea392edaea08b821258e7546b1b320492721cb91bbb93549ba8418eb28b9d06568ffac0787b2b74f68b4679473e6a95976335d8f8e6b5762d856761de8063337a42b06773ec98f5e392cfed435dd4f76834cb81ed3aeecf09f802c733a216acdad19dee17f84af64b43f78c0c3dbe77dcab077eafc2b2d3889a6d21ad6e4ee6649ef94bd6b60f20927b09d979dd93a31529c1716f2bfdaf55ed965731d1117c709e6b7968ac1ae69ed5e749803199c38669d5acf4eab771f844e1f4e8418c7356b6fdc4cba3ba97f4d030bce194dedd30462c1b4baa04bda4c7d319ea27455a852753b41a6487069304e62245df6d56e05315c343983b3a8fa472c029ded46889133d17502579b1b5d7a8490d264ce170f646ac360a8fff0098e0dc2ec678183227e42dcbacac6f659f4e11184f0bb3cd4ecb19dd8b8c67877154d5bb9c35807756331927c203b348a6e93da22e000ddb81ce4c1f54b68b1b6970104119822470222fe588bd5ab759661ed041e79f02aa59e91719cf1245d767f33c5469cefb2b1e01cef8f85ca5b1e9d23bc6410e1077ae3260c82119accea9f0331377847df92b9498d7b631f606eb8dd77f2abed2a3bf4f88c0e91efea8d7823ba5c4939576ca2e954eddb41b48604de05c0e2708398efbb354364db64869d60fe35516d5daafa4e14cb778c493240bc98e7cd514866067af25cfa7073e119b2daf791668d565366d633bd7e1266fbf0c78a36cb48893f0a9537f55d5a9f45a8d9b5896904cc1b8ea3f8c1136942364b3b1bda9f08455abd1f0e71d0d9de160de81add1d54a924b89b542f999cf917a8b74a7909a42cc85b2bb1c16b3a37d25ea0f5752770e07f47ff9d46588cd64484889cd163a0ca8d5a61c20af7eab483c48be6fbb30843e9c2c4f463a4bd41146a9ec1c0fe83ffafa62bd3ab500e12138d707091bacbab4cb4c1db91596b63206f777b2094abef1234382d5d5a59159b1b3f75e4f819bbf3f02cae296f07501ff00ab4f855c88d27c4f44469419c7ed3c3e60825bed3020ab968da4ca42f70e42f3e0b0db4368bea9bae1e679e9dc92b6b77bce440e64a66ad768eea77daf74c88d6ff656b6702edfacf3bc4f6413a68382cc1a04f15a6b0d9dcda4d6e724f8a72ea886b3077c7850b5ada9db6d945acd55d79c00bb97f27d158feb0e538e23093ae9f64ca6e8606c639fdfe60abd364dc2ebf0f648fa6374f533ff0076462cf6c2fbc5d102f04498c7888cd71f6876f1044c637667d7ee9ad6b5b79d3d30f92a6692f91addcda39e85545827645aec4e159a2d381f97ff0039df99598db96bdc6ee83dacc8e04ddaa396b229d324c8bb76758cf49f55e696eb43dc4971c2e9d74ef4d5b50d4794054d4ad12569762d9b79efa87f540d6e03095b966e9204deb11d1e77f85a5da931adf88e68e068776f020ebe0a378dfa8cf231e02adb5703bad2ba901dff003b9542f035bfdf3549b6d2ebbc3f8e4a3af549c22fe513f64b6ae614e9b4ec54d55f031555b70241c7df3f05252a5d6487b868222ee655370dd3b840ce08320c5d919e31968b8544c818ee8a5026411eb8f0f9922e1ec208ca2ff9c3d7b901b33c37b22f8d73c7dd4dd616dee02ee731f35bb4c906bf3e55355a84561d5d6711a83e2b4b46a53aa3b4d06e8bc0f90b1dd24b4bd8f63a981da064c660dde450cb35aad8efa477ee9f757b2c1c7ea046542bdc0d8cc85e85568b58d76ee11e60f982a9d2b3bea3806df7cfcd02a5b3761daea99a8e2d133a15e9d63b0b69b6078e67994ddb7062482e303b256b7130dc0c94fa14b75a1ba79ab40240286d1696d312e2b71ad0d1d0058e4927dd58dd4966ced279bc0492c789d3ea98fe85dd178539aa32148f681aa84809705681093973793aed14448d172093ef5b6e8af4a7aa228d63d8c1aefd1c0fedff00c796187dee03c5273c705653790a15a987082be91fe999507b284ec661c6f5e5dd15e96754451ac7b3835dfa381fdbc7fd7961ec946b0704e30872cca94cb4c7c1595da3b02911f481c9661fd1ca52bd3ad4c90b295c4141d4c745c2a1eab34eb2d1a3706c942a8bb7aa498b8f82d75b5a0d326300b25b3d803403792649ff00c7c8fd964714699c9c72002d4e18f1a4c0c9dcca23599100e1f69562cf05dbd038f15da9dacf877eaa064b0df94dfc461778ace94fb5d2a3b7db22a069100fbe3e28a52a9ba777537dd871e4421b6966fb640920493c1729da1c58328106ec46447c85c0ce513b47caabd25b40b9bbd72f3ab54dc0e58f3fc2d1edb7cbf13f5033c2ff00559e224cad6e1d4a04a42f2a7f6a2db12aeee671c3203877e2b52eaa1de1caff00bacaecfa5bae0568a98117cfb6896e294fea9ea15d62e96fb6172a5a8b177afde767cf188551d4c9329e18776f1fcfe12a58132d30886e341c386271cfda325d7bc4c802049e5392a74ed0d703060cc469763c547bdba208de170bae9bf3ce4eb1118a8b681e8a5ac234ca9bd38ef0b8f3bb11e4954a8f3196b27d33f1bb8aab63106073e3271bc5c471f0443666c47d533370cce33e739dc47815365b19c092a8355b12e300235b2ac5d74978b81c3291778c6256b68d95adc02563b20a6d0d6fe4abed6adeb0b6d2d00efb9f758d7d73a9c48db92e31b0a501240b6b6dc651118b8e0d189e2741f04a61ee0d1270150c61260092885bb68328b649f727403558aa96b7563bce90326e9ee50d351f55dbf50df90c87003e4abac2305917b785f8181faad6b3b30cc9cbbf45683be47f2928841fca4954ca02fa3c3d144ea2341e488f547e38a8aa523f09443954421268b464df01ec906b7407b95b7b08c479a8e0c61e68ea400555d676c4eeb7c935b4d9a37be3d95c348c65e699d59f84a3a918550d06c603c02d2ec2dbbd5914ea1ece44ff00af03fb7d396021acbb255ea5138dca542e0b4c82a356887082bda29d50e0815beca4190b2fb0f6c9a70ca86ec8fe9fe3d17a1d2aa1e16cdbd70f123c85937144b4c1f05635ed9041cee402ad85cd322fe39f7af47b46cc0ec2e416b6cf737255dd5a070ca9db5c96ecb2b444903e4a95ee2266fd5187d9066154b4592ab84308ef0b32af093383213b4f888e632a12d205d80f48be565abed5a4c2776f33176633bd1bafb3ad8ea7d59dd837170c48d341ed7204de8b54072565af0d8dd07def4281daed2d7e00ce64fe4a86cb652e382f40b17465adbdd7a3f4b67b1b8009fa36d096ab773dd653676c638b94f5acdbb20c0e256c43156b4d99af104285fd8eb02370bacefb49cec579c5575e40eefc65e33c9461f88e21a79f0d491e0b575f61e6d13c153a5d1eb5547765a18d9c4de7e72488b376da63bad1febd9bca0165dd739c3ba62e919cce6535b4fac86b01799c1a33ca5d846b8e5002f4ab0743836faaf73f8603c02d659ac34e9886340e413946c0f3294afc4ba0583d8dd1cae7b55486f018c69392de59ac4ca6ddd68569761354a8346c12556b176e570049ce0315157b4358092623c9613686d87563bac24375cddec3d546eae430677e414ade8171c7928aed2db84f62963ae4396a7c904a3b3a4ef3e49379273f12ac5968b5aae6fb78ac7b8b873cc9f85a946906881e4a653a5964a7ea4460177ad1a29195557089715c1419a787e525275c1245464a00d0a3212495215caa550aa1c57525605129ce5ddd1a24920b9465a3d5348b97525c88509172dcf479c7ab1cc8ee5c493dc23eff00094e29f6f95b06a452496c2cc2abd4684d0d1a2492822531e10eaa1249140aa8524924545a9c905c497228b59da344402492e76cb82eae2ea480522b8175d82492250583e9338cb06449bb2372a3640124962f12fbcf85afc3fed088b5c544f37a492595ad538532492e5c548b892482e5ffd9, 'Masala, Paneer, Flour, Oil', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer facilisis purus viverra aliquam\r\n                        volutpat. Maecenas pellentesque et sem ornare placerat. Curabitur at lorem in sapien venenatis\r\n                        commodo. Nulla auctor efficitur arcu sed dapibus. Aliquam mollis bibendum lorem. Donec\r\n                        ullamcorper, dui vitae tincidunt dignissim, neque tortor dignissim augue, nec molestie libero mi\r\n                        eget nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                        himenaeos. Donec vitae leo pretium dolor hendrerit fringilla. Vivamus ut ipsum ullamcorper,\r\n                        semper tortor in, convallis ipsum. Curabitur sit amet auctor neque, sed interdum lorem.\r\n                        Curabitur lobortis suscipit neque et suscipit.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD KEY `uid` (`uid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `ownerid` (`ownerid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD CONSTRAINT `friendlist_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friendlist_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
