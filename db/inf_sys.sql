-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 07:29 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inf_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_degree`
--

CREATE TABLE `academic_degree` (
  `inf_user_id` int(11) NOT NULL,
  `inf_academic_degree` varchar(255) NOT NULL,
  `inf_degree_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_degree`
--

INSERT INTO `academic_degree` (`inf_user_id`, `inf_academic_degree`, `inf_degree_id`) VALUES
(28, 'Student', 7),
(29, 'Student', 8),
(30, 'Bachelors', 9),
(31, 'Professor', 10);

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `inf_user_id` int(11) NOT NULL,
  `inf_admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`inf_user_id`, `inf_admin_id`) VALUES
(28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `inf_article_id` int(11) NOT NULL,
  `inf_article_title` varchar(255) NOT NULL,
  `inf_article_description` mediumtext NOT NULL,
  `inf_article_url` varchar(511) NOT NULL,
  `inf_user_id` int(11) NOT NULL,
  `inf_approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`inf_article_id`, `inf_article_title`, `inf_article_description`, `inf_article_url`, `inf_user_id`, `inf_approved`) VALUES
(10, 'Price Competition in Online Combinatorial Markets 2014', 'We consider a single buyer with a combinatorial preference that would like to purchase related\r\nproducts and services from different vendors, where each vendor supplies exactly one product.\r\nWe study the general case where subsets of products can be substitutes as well as complementary\r\nand analyze the game that is induced on the vendors, where a vendorâ€™s strategy is the price that\r\nhe asks for his product. This model generalizes both Bertrand competition (where vendors are\r\nperfect substitutes) and Nash bargaining (where they are perfect complements), and captures a\r\nwide variety of scenarios that can appear in complex crowd sourcing or in automatic pricing of\r\nrelated products.\r\nWe study the equilibria of such games and show that a pure efficient equilibrium always\r\nexists. In the case of submodular buyer preferences we fully characterize the set of pure Nash\r\nequilibria, essentially showing uniqueness. For the even more restricted â€œsubstitutesâ€ buyer\r\npreferences we also prove uniqueness over mixed equilibria. Finally we begin the exploration of\r\nnatural generalizations of our setting such as when services have costs, when there are multiple\r\nbuyers or uncertainty about the the buyerâ€™s valuation, and when a single vendor supplies multiple\r\nproducts', 'uploads/1 Price Competition in Online Combinatorial Markets 2014.pdf', 29, 1),
(11, 'Price Competition, Fluctuations and Welfare Guarantees 2015', 'In various markets where sellers compete in price, price oscillations are observed rather than convergence\r\nto equilibrium. Such fluctuations have been empirically observed in the retail market for gasoline, in airline\r\npricing and in the online sale of consumer goods. Motivated by this, we study a model of price competition\r\nin which equilibria rarely exist. We seek to analyze the welfare, despite the nonexistence of equilibria, and\r\npresent welfare guarantees as a function of the market power of the sellers.\r\nWe first study best response dynamics in markets with sellers that provide a homogeneous good, and\r\nshow that except for a modest number of initial rounds, the welfare is guaranteed to be high. We consider\r\ntwo variations: in the first the sellers have full information about the buyerâ€™s valuation. Here we show that\r\nif there are n items available across all sellers and nmax is the maximum number of items controlled by any\r\ngiven seller, then the ratio of the optimal welfare to the achieved welfare will be at most log \r\nn\r\nnâˆ’nmax+1\r\n+1.\r\nAs the market power of the largest seller diminishes, the welfare becomes closer to optimal. In the second\r\nvariation we consider an extended model in which sellers have uncertainty about the buyerâ€™s valuation.\r\nHere we similarly show that the welfare improves as the market power of the larger seller decreases, yet\r\nwith a worse ratio of n\r\nnâˆ’nmax+1 . Our welfare bounds in both cases are essentially tight. The exponential\r\ngap in welfare between the two variations quantifies the value of accurately learning the buyerâ€™s valuation\r\nin such settings.\r\nFinally, we show that extending our results to heterogeneous goods in general is not possible. Even for\r\nthe simple class of k-additive valuations, there exists a setting where the welfare approximates the optimal\r\nwelfare within any non-zero factor only for O(1/s) fraction of the time, where s is the number of sellers.\r\nCategories and Subject Descriptors: J.4 [Social and Behavioral Sciences]: Economics; F.2.0 [Analysis of\r\nAlgorithms and Problem Complexity]: General\r\nGeneral Terms: Algorithms, Economics, Theory\r\nAdditional Key Words and Phrases: Price Competition, Best Response Dynamics, Welfare Guarantee', 'uploads/2 Price Competition, Fluctuations and Welfare Guarantees 2015.pdf', 28, 0),
(12, 'Combinatorial Auctions with Decreasing 2002', 'In most of microeconomic theory, consumers are assumed to exhibit\r\ndecreasing marginal utilities. This paper considers combinatorial auctions\r\namong such submodular buyers. The valuations of such buyers are placed\r\nwithin a hierarchy of valuations that exhibit no complementarities, a hierarchy\r\nthat includes also OR and XOR combinations of singleton valuations,\r\nand valuations satisfying the gross substitutes property. Those last\r\nvaluations are shown to form a zero-measure subset of the submodular\r\nvaluations that have positive measure. While we show that the allocation\r\nproblem among submodular valuations is NP-hard, we present an\r\nefficient greedy 2-approximation algorithm for this case and generalize it\r\nto the case of limited complementarities. No such approximation algorithm\r\nexists in a setting allowing for arbitrary complementarities. Some\r\nresults about strategic aspects of combinatorial auctions among players\r\nwith decreasing marginal utilities are also presented.\r\n', 'uploads/3 Combinatorial Auctions with Decreasing 2002.pdf', 28, 1),
(13, 'Connections between Learning, Game Theory, and Optimization', 'The combinatorial auction setting is formalized as follows. There is a set X of m indivisible\r\ngoods that are concurrently auctioned among n bidders/players. Each player i âˆˆ {1, . . . , n}\r\nhas a valuation function mapping a subset of products to their value to the player, so\r\nvi\r\n: 2X â†’ R.\r\nTypical assumptions, that we will make today, are monotonicity (also known as â€œfree disposalâ€),\r\ni.e. vi(S) â‰¤ vi(T), âˆ€ S âŠ† T, and v(âˆ…) = 0.\r\nThe whole point of defining a player valuation is that the value of a bundle of items need not\r\nbe equal to the sum of his values for the items in the bundle. For disjoint sets S âˆ©T = âˆ…, we\r\nsay that S, T are complements if v(S âˆª T) â‰¥ v(S) + v(T) (for example S, T are a right shoe\r\nand a left shoe) and we say that S, T are substitutes if v(S âˆª T) â‰¤ v(S) + v(T) (for example\r\nS, T are margarine and butter).\r\nWe will assume quasilinear utilities, i.e. if the bidder wins a bundle S and pays p then its\r\nutility is vi(S) âˆ’ p. We also assume no externalities, i.e. that a bidder only cares about the\r\nitems he receives and not about how the other items are allocated among the other bidders.\r\nIn general we have representation and communication concerns: the valuation functions are\r\nexponential sized objects since they specify a value for each bundle. So we in general we have\r\nto deal with the question of how can enough information be transferred to the seller so that\r\na reasonably good decision can be made? For the rest of the lecture today we will consider\r\na class of valuations for which representation is easy, exact optimization is challenging, but\r\nthe best possible approximation is achieved by a truthful mechanism.', 'uploads/4 Connections between Learning, Game Theory, and Optimization 2010.pdf', 31, 1),
(14, 'Truth Revelation in Approximately Efficient Combinatorial Auctions', 'Abstract. Some important classical mechanisms considered in Microeconomics and Game Theory\r\nrequire the solution of a difficult optimization problem. This is true of mechanisms for combinatorial\r\nauctions, which have in recent years assumed practical importance, and in particular of the gold\r\nstandard for combinatorial auctions, the Generalized Vickrey Auction (GVA). Traditional analysis\r\nof these mechanismsâ€”in particular, their truth revelation propertiesâ€”assumes that the optimization\r\nproblems are solved precisely. In reality, these optimization problems can usually be solved only in an\r\napproximate fashion. We investigate the impact on such mechanisms of replacing exact solutions by\r\napproximate ones. Specifically, we look at a particular greedy optimization method. We show that the\r\nGVA payment scheme does not provide for a truth revealing mechanism. We introduce another scheme\r\nthat does guarantee truthfulness for a restricted class of players. We demonstrate the latter property by\r\nidentifying natural properties for combinatorial auctions and showing that, for our restricted class of\r\nplayers, they imply that truthful strategies are dominant. Those properties have applicability beyond\r\nthe specific auction studied', 'uploads/6 Truth Revelation in Approximately Efficient - LOS-JACM(proof) .pdf', 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `inf_article_category` varchar(255) NOT NULL,
  `inf_article_id` int(11) NOT NULL,
  `inf_article_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`inf_article_category`, `inf_article_id`, `inf_article_category_id`) VALUES
('Computer Science', 10, 1),
('Computer Science', 11, 2),
('Mathematics', 12, 3),
('', 13, 4),
('Mathematics', 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `inf_article_id` int(11) NOT NULL,
  `inf_Author_id` int(11) NOT NULL,
  `inf_Author_first_name` varchar(255) NOT NULL,
  `inf_Author_last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`inf_article_id`, `inf_Author_id`, `inf_Author_first_name`, `inf_Author_last_name`) VALUES
(10, 10, 'Moshe', 'Babaiof'),
(11, 11, 'Noam', 'Nisan'),
(12, 12, 'Benny', 'Lehmann'),
(13, 13, 'Maria-Florina', 'Balcan'),
(14, 14, 'DANIEL ', 'LEHMANN');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `inf_user_id` int(11) NOT NULL,
  `inf_category_type` varchar(255) NOT NULL,
  `inf_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`inf_user_id`, `inf_category_type`, `inf_category_id`) VALUES
(28, 'Digital Systems', 10),
(29, 'Digital Systems', 11),
(30, 'Computer Science', 12),
(31, 'Business Administration', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `inf_user_id` int(11) NOT NULL,
  `inf_first_name` varchar(255) NOT NULL,
  `inf_last_name` varchar(255) NOT NULL,
  `inf_email` varchar(255) NOT NULL,
  `inf_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`inf_user_id`, `inf_first_name`, `inf_last_name`, `inf_email`, `inf_password`) VALUES
(28, 'Nikos', 'Kongkika', 'kongkika@gmail.com', '123456'),
(29, 'Giorgos', 'Margaritis', 'margaritis@gmail.com', '123456'),
(30, 'Alexis', 'Trakakis', 'trakakis@gmail.com', '123456'),
(31, 'Vasilis', 'Nikolaou', 'nikolaou@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_degree`
--
ALTER TABLE `academic_degree`
  ADD PRIMARY KEY (`inf_degree_id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`inf_admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`inf_article_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`inf_article_category_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`inf_Author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`inf_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`inf_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_degree`
--
ALTER TABLE `academic_degree`
  MODIFY `inf_degree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `inf_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `inf_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `inf_article_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `inf_Author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `inf_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `inf_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
