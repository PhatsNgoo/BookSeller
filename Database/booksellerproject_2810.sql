-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 04:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksellerproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(11) NOT NULL CHECK (BookID <> ''),
  `Title` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Title <> ''),
  `Price` float NOT NULL CHECK (Price <> ''),
  `Description` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Description <> ''),
  `Author` varchar(60) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Author <> ''),
  `Category` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Category <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `Title`, `Price`, `Description`, `Author`, `Category`) VALUES
(1, 'Bel Canto', 13.99, 'Somewhere in South America, at the home of the country\'s vice president, a lavish birthday party is being held in honor of the powerful businessman Mr. Hosokawa. Roxane Coss, opera\'s most revered soprano, has mesmerized the international guests with her singing. It is a perfect eveningâ€”until a band of gun-wielding terrorists takes the entire party hostage. But what begins as a panicked, life-threatening scenario slowly evolves into something quite different, a moment of great beauty, as terrorists and hostages forge unexpected bonds, and people from different continents become compatriots. Friendship, compassion, and the chance for great love lead the characters to forget the real danger that has been set in motion . . . and cannot be stopped.', 'Ann Pachet', 'Story'),
(2, 'Harry Potter 1st', 8.74, 'Harry Potter has no idea how famous he is. That\'s because he\'s being raised by his miserable aunt and uncle who are terrified Harry will learn that he\'s really a wizard, just as his parents were. But everything changes when Harry is summoned to attend an infamous school for wizards, and he begins to discover some clues about his illustrious birthright. From the surprising way he is greeted by a lovable giant, to the unique curriculum and colorful faculty at his unusual school, Harry finds himself drawn deep inside a mystical world he never knew existed and closer to his own noble destiny.', 'J.K. Rowling', 'Action'),
(3, 'Are You There God?', 23.7, 'A twelve-year-old talks to God about her ardent desire to be grown up.', 'Judy Blume', 'Story'),
(4, 'A Heartbreaking Work of Staggering Genius', 12.29, 'A book that redefines both family and narrative for the twenty-first century. A Heartbreaking Work of Staggering Genius is the moving memoir of a college senior who, in the space of five weeks, loses both of his parents to cancer and inherits his eight-year-old brother. Here is an exhilarating debut that manages to be simultaneously hilarious and wildly inventive as well as a deeply heartfelt story of the love that holds a family together.', 'Dave Eggers', 'Family'),
(5, 'Harry Potter and the Prisoner of Azkaban', 15.43, 'When the Knight Bus crashes through the darkness and screeches to a halt in front of him, it\'s the start of another far from ordinary year at Hogwarts for Harry Potter. Sirius Black, escaped mass-murderer and follower of Lord Voldemort, is on the run - and they say he is coming after Harry. In his first ever Divination class, Professor Trelawney sees an omen of death in Harry\'s tea leaves... But perhaps most terrifying of all are the Dementors patrolling the school grounds, with their soul-sucking kiss..', 'J.K. Rowling', 'Action'),
(6, 'Harry Potter and the Order of the Phoenix', 15.69, 'Dark times have come to Hogwarts. After the Dementors\' attack on his cousin Dudley, Harry Potter knows that Voldemort will stop at nothing to find him. There are many who deny the Dark Lord\'s return, but Harry is not alone: a secret order gathers at Grimmauld Place to fight against the Dark forces. Harry must allow Professor Snape to teach him how to protect himself from Voldemort\'s savage assaults on his mind. But they are growing stronger by the day and Harry is running out of time...', 'J.K. Rowling', 'Action'),
(7, 'Harry Potter and the Goblet of Fire', 14.99, 'The Triwizard Tournament is to be held at Hogwarts. Only wizards who are over seventeen are allowed to enter - but that doesn\'t stop Harry dreaming that he will win the competition. Then at Hallowe\'en, when the Goblet of Fire makes its selection, Harry is amazed to find his name is one of those that the magical cup picks out. He will face death-defying tasks, dragons and Dark wizards, but with the help of his best friends, Ron and Hermione, he might just make it through - alive!', 'J.K. Rowling', 'Action'),
(8, 'Harry Potter and the Chamber of Secrets', 13, 'Harry Potter\'s summer has included the worst birthday ever, doomy warnings from a house-elf called Dobby, and rescue from the Dursleys by his friend Ron Weasley in a magical flying car! Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start. Students are found as though turned to stone... Dobby\'s sinister predictions seem to be coming true.', 'J.K. Rowling', 'Action'),
(9, 'Harry Potter and the Deathly Hallows', 12.85, 'As he climbs into the sidecar of Hagrid\'s motorbike and takes to the skies, leaving Privet Drive for the last time, Harry Potter knows that Lord Voldemort and the Death Eaters are not far behind. The protective charm that has kept Harry safe until now is broken, but he cannot keep hiding. The Dark Lord is breathing fear into everything Harry loves and to stop him Harry will have to find and destroy the remaining Horcruxes. The final battle must begin - Harry must stand and face his enemy ...', 'J.K. Rowling', 'Action'),
(10, 'Harry Potter and the Half-Blood Prince', 15.79, 'When Dumbledore arrives at Privet Drive one summer night to collect Harry Potter, his wand hand is blackened and shrivelled, but he does not reveal why. Secrets and suspicion are spreading through the wizarding world, and Hogwarts itself is not safe. Harry is convinced that Malfoy bears the Dark Mark: there is a Death Eater amongst them. Harry will need powerful magic and true friends as he explores Voldemort\'s darkest secrets, and Dumbledore prepares him to face his destiny...', 'J.K. Rowling', 'Action'),
(11, 'Harry Potter and the Cursed Child', 17.57, 'This definitive and final playscript updates the \'special rehearsal edition\' with the conclusive and final dialogue from the play, which has subtly changed since its rehearsals, as well as a conversation piece between director John Tiffany and writer Jack Thorne, who share stories and insights about reading playscripts. This edition also includes useful background information including the Potter family tree and a timeline of events from the Wizarding World prior to the beginning of Harry Potter and the Cursed Child.', 'J.K. Rowling', 'Action'),
(12, 'The Strange Journey of Alice Pendelbury', 7.48, 'Alice Pendelbury believes everything in her life is pretty much in orderâ€”from her good friends to her burgeoning career. But even Alice has to admit itâ€™s been an odd week. Not only has her belligerent neighbor, Mr. Daldry, suddenly become a surprisingly agreeable confidant, but heâ€™s encouraging her to take seriously the fortune-teller who told her that only by traveling to Turkey can Alice meet the most important person in her life.', 'Marc Levy', 'Romance'),
(13, 'P.S. from Paris', 7.48, 'Even though everything about Paris seems to be nudging them together, the two lonely ex-pats resist, concocting increasingly far-fetched strategies to stay â€œjust friends.â€ A feat easier said than done, as fate has other plans in store. Is true love waiting for them in a postscript?', 'Marc Levy', 'Comedy'),
(14, 'The Last of the Stanfields', 7.48, 'A mystery, a love story, and a search through a shadowy past. Two strangers unite in this novel of family secrets by international bestselling author Marc Levy, the most read contemporary French author in the world.', 'Marc Levy', 'Drama'),
(15, 'All Those Things We Never Said', 8.65, 'From international bestselling author Marc Levy, the most widely read writer in France today, comes an unusual and charming love story that reunites a father and daughter, and past and present, in the most unexpected ways.', 'Chris Murray', 'Comedy'),
(16, 'If Only It Were True', 748, 'Arthur and Lauren are in love. They even live together. Well, itâ€™s not exactly that simple. Lauren is a ghost, but sheâ€™s in love with Arthur, the only one who can see her. But this isnâ€™t a ghost story, because Lauren isnâ€™t really dead. You see, her body is in a coma across town, and since nobody can see her sheâ€™s gone to back to live in her apartment. The one Arthur has just moved into. Like I said, itâ€™s complicated.', 'Chris Murray', 'Drama'),
(17, 'And Then You Loved Me', 8.78, 'Readers who have enjoyed the emotional, heartfelt stories of authors like Jodi Picoult and Nicholas Sparks may enjoy this great read about life, love, and the consequences of choices and actions.', 'Inglath Cooper', 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `giftcode`
--

CREATE TABLE `giftcode` (
  `Code` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Code <> ''),
  `Value` float NOT NULL CHECK (Value <> ''),
  `Useable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `giftcode`
--

INSERT INTO `giftcode` (`Code`, `Value`, `Useable`) VALUES
('fg45gsdfg', 56, 1),
('fwfg35gdfg', 30, 1),
('Ifdi09teh', 100, 0),
('S3phjr0th', 15, 1),
('t4gtry345srg', 15, 1),
('Uzur3u2w', 10, 0),
('vb4tyw356', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(20) NOT NULL CHECK (TransactionID <> ''),
  `State` int(11) NOT NULL CHECK (State <> ''),
  `BookID` int(11) NOT NULL CHECK (BookID <> ''),
  `UserName` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (UserName <> ''),
  `ShippingAddress` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (ShippingAddress <> ''),
  `DateTime` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (DateTime <> ''),
  `Phone` char(11) CHARACTER SET utf8 NOT NULL CHECK (Phone <> '')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `State`, `BookID`, `UserName`, `ShippingAddress`, `DateTime`, `Phone`) VALUES
(1, 1, 3, 'kelvjn', '26 Ton Duc Thang Ha noi', '10/28/2019', '096545476'),
(2, 1, 9, 'kelvjn', '27/61 Da Kao Thanh Pho HCM', '10/28/2019', '0912354667'),
(3, 1, 12, 'phatsngoo', 'To Huu Street, Ha Dong, room 5-08 CT2 Van Khe Urban', '10/28/2019', '0967162652'),
(4, 1, 8, 'vicinus', '50 Nguyen Trai street Ha noi', '10/28/2019', '0921758443'),
(5, 1, 14, 'vicinus', '48 Chua Boc Ha noi', '10/28/2019', '0921758443'),
(6, 1, 2, 'eleventhacc', '37 St Jose Street NY, America', '10/28/2019', '01567392754'),
(7, 1, 16, 'eleventhacc', '37 St Jose Street NY, America', '10/28/2019', '01567392754');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserName` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (UserName <> ''),
  `UserID` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (UserID <> ''),
  `Password` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Password <> ''),
  `Email` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL CHECK (Email <> ''),
  `Balance` float NOT NULL,
  `UserRole` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `UserID`, `Password`, `Email`, `Balance`, `UserRole`) VALUES
('eightthacc', 7, 'adsf423q8rb', 'jdhasdkj@gmail.com', 0, 'User'),
('eleventhacc', 9, 'aacc1234', 'asdewr@gmail.com', 0, 'User'),
('fifthacc', 5, 'iow8ehw8', 'gruuhhh@gmail.com', 0, 'User'),
('fourhtacc', 3, 'aacc1234', 'kelldjn@gmail.com', 0, 'User'),
('kelvjn', 4, 'iow8ehw8', 'kelvingH@gmail.com', 0, 'User'),
('ninethacc', 8, 'asd23sfg', 'jhhggh@gmail.com', 0, 'User'),
('phatsngoo', 1, 'Uzur3u2w', 'phatsngoo2702@gmail.com', 110, 'Admin'),
('seventhac', 6, 'asd23sfg', 'asdewr@gmail.com', 0, 'User'),
('tenthacc', 10, 'Uzur3u2w', 'sdfafer@gmail.com', 0, 'User'),
('twelvethacc', 11, 'adsf423q8rb', 'asdewr@gmail.com', 0, 'User'),
('vicinus', 2, 'iow8ehw8', 'vinnnvvv@gmail.com', 256, 'User');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `FK_UserID` (`UserName`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`),
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
