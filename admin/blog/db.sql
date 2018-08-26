-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 02:23 PM
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
(30, 'Celebrate CSEdWeek and Save: Try an Hour of Code on edX', '<p>dedicated to inspiring students to take interest in computer science. The program was created as a call to action to raise awareness about the need for computer science education at all levels and to underscore the critical role of computing in all careers.</p>\r\n<p>This week, we are challenging&nbsp;our learners to try an hour of code.&nbsp;Whether you&rsquo;re 7 or 77 you can start coding on edX today. As part of CSEdWeek, we are excited to offer our learners 15% off all computer science verified certificates. With over 400+ courses to choose from, at every skill level, don&rsquo;t miss this opportunity to learn a new, in-demand skill.&nbsp;&nbsp;</p>\r\n<p>We&rsquo;ve pulled together some great&nbsp;<a href=\"https://www.edx.org/course/subject/computer-science\" target=\"_blank\" rel=\"noopener\">computer science</a>&nbsp;courses to help you begin&nbsp;or enhance your computer science and programming skills.&nbsp;Enroll, save and start coding today!&nbsp;</p>', 'CSEDWEEK.jpg', '2018-08-19 12:43:44');

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
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
