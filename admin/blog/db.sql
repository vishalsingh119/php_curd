-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 12:14 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE `blog_members` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Demo', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postCont` text,
  `postImg` varchar(50) DEFAULT NULL,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postCont`, `postImg`, `postDate`) VALUES
(23, 'General Computer Science and Programming', '<p>1.&nbsp;<a title=\"Communications of the ACM\" href=\"http://cacm.acm.org/blogs/about-the-blogs\">Communications of the ACM</a>: More than a blog, Communications of the ACM is an entire online publication dedicated to all aspects of computing and information technology. Both blog entries and news articles are posted directly on the site, but the blogroll contains links to other blogs that may be of interest to the aspiring programmer.<br /><strong>Highlight:</strong>&nbsp;<a href=\"http://cacm.acm.org/blogs/blog-cacm/173827-those-who-say-code-does-not-matter/fulltext\" target=\"_blank\">Those who say Code Does not Matter</a></p>', '820359.png', '2018-08-19 10:57:50'),
(24, 'research institution. It muses on issues in teaching computer', '<p>um computing. He also poses more general thoughts on the relationship between computer scientists, industry, politics, and the general public.<br /><strong>Highlight:</strong>&nbsp;<a href=\"http://www.scottaaronson.com/blog/?p=1981\" target=\"_blank\">Do Theoretical Computer Scientists Despis</a></p>', '432422.jpg', '2018-08-19 10:58:14'),
(25, 'What Salary Should I Expect By Computer Science Degree Level?', '<p>Before investing time and money into a college degree it is important to take into consideration how your investment can be turned into profit. There are many ways to calculate the starting salaries and earning potential in your field of choice. Computer science degrees are some of the most employable types of degrees that students can choose. As many job&nbsp;</p>', 'ladders.jpg', '2018-08-19 12:30:23'),
(26, 'The 10 Most Lucrative IT Certifications of 2018', '<p>nformation technology is a highly dynamic and ever-changing field, however. As the industry evolves, new types or sets of certifications continue to crop up, while once-desirable credentials fall out of favor. So what IT certifications do today&rsquo;s employers want to see? We&rsquo;ve ranked the 10 of the most high-paying IT certifications of 2018 in ascending order, and given you the essentials on each, including:</p>', 'network-2402637_1280.jpg', '2018-08-19 12:31:02'),
(27, 'The 20 Most Affordable Online Bachelorâ€™s in Computer Science Degree Programs', '<p>According to the U.S. Bureau of Labor Statistics, computer and technology occupations are expected to grow 13% over the next decade &mdash; nearly twice the national average &mdash; adding over 550,000 new jobs in programming, computer networks, database systems, web development, and software, among other fields. And with the continued explosion of digital technologies, especially cloud computing, big data, and information security, public and private organizations will be eagerly seeking qualified professionals to manage their tech needs, leading to a highly competitive, lucrative job market. As of 2018, the median annual wage for computer and information technology professionals is nearly&nbsp;</p>', 'affordable_bachelors_CS-01.png', '2018-08-19 12:31:51'),
(28, 'Learning in an Accessible Way: Meet Aditi', '<p>I have been working in Data Security for the last few years and realized that as cyberattacks become more sophisticated, so do the security tools. In order to stay relevant, I wanted to learn about Machine Learning and AI, so I could create the next generation of security tools.</p>\r\n<p>I wanted to learn online, &nbsp;but my previous experience with massive open online courses (MOOCs) had been unfavorable &ndash; I&rsquo;m blind, and the lack of accessible courses made learning online a struggle. My mentor suggested that I check out edX, and after looking through the course catalog, I was thrilled to see the amount of accessible content from the world&rsquo;s best universities and organizations. I signed up for MITx&rsquo;s&nbsp;<a href=\"https://www.edx.org/course/introduction-computer-science-mitx-6-00-1x-11\" target=\"_blank\" rel=\"noopener\">Introduction to Computer Science and Programming Using Python</a>&nbsp;&ndash; and I was blown away.</p>\r\n<p>It was the first completely accessible course I&rsquo;d ever taken online, and perfectly coincided with my learning goals. After I finished that course, I then took MITx&rsquo;s&nbsp;<a href=\"https://www.edx.org/course/introduction-computational-thinking-data-mitx-6-00-2x-6\" target=\"_blank\" rel=\"noopener\">Introduction to Computational Thinking and Data Science</a>. I&rsquo;ve never been able to study math without sighted assistance in the past, but on edX even this math-heavy course was readable to my screen reader. I finished without any significant glitches! I also took the&nbsp;<a href=\"https://www.edx.org/course/toeflr-test-preparation-insiders-guide-etsx-toeflx-4\" target=\"_blank\" rel=\"noopener\">TOEFL Test Preparation</a>&nbsp;from ETSx on edX, and will be attending Georgia Tech in the fall for my master&rsquo;s degree.</p>\r\n<p>At work, having the knowledge from my edX courses has helped me become a better employee. It&rsquo;s given me the confidence to become a better leader &ndash; I even introduced my team to MOOCs, so training for new projects has become significantly easier. After taking the computational thinking class, I have become a much better programmer. My boss says that I&rsquo;m no longer a programmer, but a Computer Scientist.</p>\r\n<p>I am extremely fortunate to be able to take classes from the best universities in the world that are always accessible online. EdX is an important resource for me to keep growing both personally and&nbsp;</p>', 'aditi.jpg', '2018-08-19 12:42:45'),
(29, '12 Courses You Can Complete in 6 Weeks or Less!', '<p>Short on time, but still interested in learning or honing a new skill? We&rsquo;ve handpicked 12 computer science and business courses that can be completed in six weeks or less, so you can start learning and reaching your goals today!</p>', '6-weeks-or-less-2.jpg', '2018-08-19 12:43:15'),
(30, 'Celebrate CSEdWeek and Save: Try an Hour of Code on edX', '<p>dedicated to inspiring students to take interest in computer science. The program was created as a call to action to raise awareness about the need for computer science education at all levels and to underscore the critical role of computing in all careers.</p>\r\n<p>This week, we are challenging&nbsp;our learners to try an hour of code.&nbsp;Whether you&rsquo;re 7 or 77 you can start coding on edX today. As part of CSEdWeek, we are excited to offer our learners 15% off all computer science verified certificates. With over 400+ courses to choose from, at every skill level, don&rsquo;t miss this opportunity to learn a new, in-demand skill.&nbsp;&nbsp;</p>\r\n<p>We&rsquo;ve pulled together some great&nbsp;<a href=\"https://www.edx.org/course/subject/computer-science\" target=\"_blank\" rel=\"noopener\">computer science</a>&nbsp;courses to help you begin&nbsp;or enhance your computer science and programming skills.&nbsp;Enroll, save and start coding today!&nbsp;</p>', 'CSEDWEEK.jpg', '2018-08-19 12:43:44'),
(31, 'How to Block Jio from Showing Ads on your Android Phone', '<p>I use a limited number of&nbsp;<a href=\"https://www.labnol.org/internet/best-android-apps/28644/\">Android apps</a>&nbsp;from known developers and was fairly certain that adware was related to the Jio phone service. After fiddling with every possible setting inside Android to disable the ads, I turned to Twitter for help.</p>\r\n<p>You can read the entire&nbsp;<a href=\"https://twitter.com/labnol/status/1004678640389353472\">Twitter thread</a>&nbsp;or here&rsquo;s a quickly summary:</p>\r\n<ol>\r\n<li>Uninstall MyJio, Jio 4G Voice and all other Jio apps.</li>\r\n<li>Revoke all permissions of Jio apps. Long press the app icon, press the info button, go to App Permission and uncheck everything. Also turn off the &ldquo;draw over the apps&rdquo; permission for Jio apps.</li>\r\n<li>For Android Oreo or later, go to Settings &gt; Apps &gt; MyJio and turn off the &ldquo;App can appear on top&rdquo; setting. You probably need to do this for every Jio app on the device.</li>\r\n<li>Root the phone and install AdAway, an ad block that uses the hosts file to block specific&nbsp;<a href=\"https://www.labnol.org/software/edit-hosts-files-as-administrator/13673/\">hostnames</a>&nbsp;and IP addresses.</li>\r\n<li>Use Greenify to hibernate all the Jio apps and prevent the app from running in the background.</li>\r\n<li>Disable &lsquo;Telephone&rsquo; access for all Jio apps. Even Jio Mags has default access to &lsquo;Telephone&rsquo;!</li>\r\n<li>Toggle background data to disable data access for all Jio related apps.</li>\r\n</ol>', 'reliance-jio.jpg', '2018-08-20 10:46:27'),
(32, 'How to Record your Android Screen with the YouTube Gaming App', '<p>Launch&nbsp;<a href=\"https://play.google.com/store/apps/details?id=com.google.android.apps.youtube.gaming&amp;hl=en\">YT Gaming</a>&nbsp;on Android and click the Go Live button. You may choose to live stream your phone directly or record the screencast first, edit the video and then upload it to YouTube.</p>\r\n<p>One the next screen, select an&nbsp;<a href=\"https://www.labnol.org/internet/best-android-apps/28644/\">Android App</a>&nbsp;that you&rsquo;d like to stream. YT Gaming will show a list of apps that fit in the &lsquo;gaming&rsquo; category but can you click the &lsquo;All Apps&rsquo; link to screencast any app that&rsquo;s installed on your Android phone.</p>\r\n<p>The recorder will stream everything you do while the session is on including incoming notifications and the text you type in input boxes.&nbsp;Also, it will record the audio from the speaker as well as surrounding sound though you do get an option to mute the microphone. The front camera can be turned off as well.</p>', 'career_banner.jpg', '2018-08-20 10:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`job_id`, `job_title`, `job_desc`) VALUES
(8, 'SOCIAL MEDIA EXECUTIVE', '<h3>SOCIAL MEDIA EXECUTIVE (M/F)</h3>\r\n<p>Location: NODWIN Gaming &ndash; Head Office, Plot No &ndash; 119, Sector 31, Gurugram, Haryana &ndash; 122001</p>\r\n<h4>JOB DESCRIPTION:</h4>\r\n<ul class=\"list-styled\">\r\n<li>The Social Media Community Executive will be responsible for the day-to-day management of the NODWIN Gaming &amp; its associated companies social media communities across Facebook, Twitter, Instagram, YouTube, Reddit, Google Plus as well as emerging platforms. You will manage the planning and the execution of social media content across all these platforms.</li>\r\n<li>Manage Social Media marketing campaigns and day-to-day activities including: Curate relevant content to reach the company&rsquo;s ideal customers.</li>\r\n<li>Create, curate, and manage all published content (images, video and written).</li>\r\n<li>Prepare monthly &amp; weekly social media marketing reports on social media performance.</li>\r\n<li>Monitor, listen and respond to users in a &ldquo;Social&rdquo; way while cultivating leads &amp; keeping the community active.</li>\r\n<li>Conduct online advocacy and open stream for cross-promotions.</li>\r\n<li>Develop and expand community and/or blogger outreach efforts.</li>\r\n<li>Oversee design (i.e.: Facebook Timeline cover, profile pic, thumbnails, ads, landing pages, Twitter profile, and blog).</li>\r\n<li>Design, create and manage promotions and Social ad campaigns.</li>\r\n<li>Compile report for management showing results (ROI).</li>\r\n<li>Become an advocate for the Company in Social Media spaces, engaging in dialogues and answering questions where appropriate.</li>\r\n<li>Demonstrate ability to map out marketing strategy and then drive that strategy proven by testing and metrics.</li>\r\n<li>Develop a strategy and implement a proactive process for capturing customer online reviews. Monitor online comments and respond accordingly.</li>\r\n<li>Monitor trends in Social Media tools, applications, channels, design and strategy.</li>\r\n<li>Identify threats and opportu'),
(9, 'DOTA 2 COMMUNITY MANAGER', '<h3>DOTA 2 COMMUNITY MANAGER (M/F)</h3>\r\n<p>Location: NODWIN Gaming &ndash; Head Office, Plot No &ndash; 119, Sector 31, Gurugram, Haryana &ndash; 122001</p>\r\n<h4>JOB DESCRIPTION:</h4>\r\n<ul class=\"list-styled\">\r\n<li>Manage online &amp; Offline events as head administrator for DOTA 2 tournaments</li>\r\n<li>Create &amp; Organize admin team as well as Referee&rsquo;ing for DOTA 2 tournaments when required</li>\r\n<li>Create rule set &amp; design formats for tournaments.</li>\r\n<li>Sorting Invite/Open Bracket signups</li>\r\n<li>Handle communication with teams/players on behalf of the company.</li>\r\n<li>Handling online qualifiers and cups for various National &amp; International DOTA 2 events.</li>\r\n<li>Creation and distribution of a player guide</li>\r\n<li>Elaborate rule-books &amp; design tournament formats.</li>\r\n<li>Setup of game related servers</li>\r\n<li>Manage prize money topics</li>\r\n<li>Ensuring IT/Event/TV know of any special needs/concerns for any DOTA 2 events</li>\r\n<li>Execute visa invitations</li>\r\n<li>Managing assets (SSD&rsquo;s/tickets/wristbands)</li>\r\n<li>Create Team/players database for event marketing.</li>\r\n<li>Drive registrations for tournaments as per the event requirement.</li>\r\n<li>Find venues to host event qualifiers / Finals across India.</li>\r\n<li>Travelling when required for events &amp; activities &ndash; National/International.</li>\r\n<li>Hosting broadcasted matches</li>\r\n<li>To hire Shout-casters and other essential people for online events &amp; offline events</li>\r\n<li>Secure quality of the tournaments</li>\r\n<li>Online/Offline activation of community etc.</li>\r\n<li>Plan &amp; Execute promotional and marketing activities for DOTA 2 on national and international platforms.</li>\r\n<li>Keep and community active &amp; ensure wellbeing of the Indian DOTA 2 community.</li>\r\n<li>Stay up to date with latest eSports news and changes happening in the DOTA 2 community from around the world.</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `team_users`
--

CREATE TABLE `team_users` (
  `userID` int(11) NOT NULL,
  `position` int(15) DEFAULT NULL,
  `userName` varchar(20) NOT NULL,
  `userProfession` varchar(50) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_users`
--

INSERT INTO `team_users` (`userID`, `position`, `userName`, `userProfession`, `userPic`) VALUES
(63, 3, 'Kunal K Singh', 'Koonal', '837942.jpg'),
(62, 2, 'shefali johnson', 'Shifu', '421014.png'),
(61, 1, ' gautam virk', 'virkaholic', '45811.png'),
(60, 0, 'akshat rathee', 'lordnod', '660756.jpg'),
(64, 4, 'Zerah Gonsalves', 'Angela', '616884.jpg'),
(65, 5, 'Ranjit Patel', 'MambaSr', '87069.jpg'),
(66, 6, 'Manoj Golla', 'Souper', '730491.jpg'),
(67, 7, 'ANUP DUSTAKAR', 'PHOBIA', '175163.png'),
(68, 8, 'GAUTAM CHAUHAN', '', '391948.jpg'),
(69, 9, 'ganesh singh', 'GST', '244324.jpg'),
(70, 10, 'Sourav Das', 'bAbai', '209508.jpg'),
(71, 11, 'Sayek Ahmed', 'Jerry', '906988.jpg'),
(72, 12, 'Gnana Shekar', 'Zoooiiinnnkkk', '691373.jpg'),
(73, 13, 'Farheen Poonawala', '', '602144.jpg'),
(74, 14, 'Satadru Bhowmik', '$etsuna', '950557.jpg'),
(75, 15, 'Aditya Shah', 'Ad1', '219779.jpg'),
(76, 16, 'Ankit Kumar', 'CHoUDHaRY', '824986.jpg'),
(77, 18, 'Bhagwant Bagh', 'b3', '672692.jpg'),
(78, 17, 'Anuj Bhutani', 'bulls', '429339.jpg'),
(79, 19, 'VAGEESH BHAN', 'GOD5LAY3R', '150170.png'),
(80, 21, 'AORIN SHARIYARI', 'PersianMeow', '37026.png'),
(81, 20, 'Dhwaj Goyal', 'bauhaus', '655433.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_members`
--
ALTER TABLE `blog_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `team_users`
--
ALTER TABLE `team_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team_users`
--
ALTER TABLE `team_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
