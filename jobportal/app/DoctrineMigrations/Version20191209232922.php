<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20191209232922 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $sql = "INSERT INTO `job_details` (`id`, `cname`, `cdescription`, `status`, `ts`) VALUES (1,'Compnay A','Job A',1,'2019-11-30 08:10:58'),(2,'Compnay B','Job B',1,'2019-11-30 08:10:58'),(3,'Compnay C','Job C',1,'2019-11-30 08:10:58'),(4,'Compnay D','Job D',1,'2019-11-30 08:10:58'),(5,'Compnay E','Job E',1,'2019-11-30 08:10:58'),(6,'Compnay F','Job F',1,'2019-11-30 08:10:58'),(7,'Compnay G','Job G',1,'2019-11-30 08:10:58'),(8,'Compnay H','Job H',1,'2019-11-30 08:10:58'),(10,'Compnay J','Job J',1,'2019-11-30 08:10:58'),(11,'Compnay K','Job K',1,'2019-11-30 08:10:58'),(12,'Compnay X','Job X',1,'2019-12-01 04:45:20');";
        $sql1 = "INSERT INTO `requirement_job` (`id`, `job_id`, `requirement_master_id`, `operator`, `ts`) VALUES (1,1,5,'OR','2019-11-30 11:26:48'),(2,1,7,'OR','2019-11-30 11:26:48'),(3,1,1,'AND','2019-11-30 12:06:35'),(4,2,10,'OR','2019-12-01 12:11:23'),(5,2,11,'OR','2019-12-01 12:11:23'),(6,2,21,'AND','2019-11-30 12:06:35'),(7,2,2,'AND','2019-11-30 12:06:35'),(8,3,12,'AND','2019-11-30 12:06:35'),(9,3,13,'AND','2019-11-30 12:06:35'),(10,4,5,'OR','2019-11-30 11:41:32'),(11,4,6,'OR','2019-11-30 11:41:32'),(12,4,7,'OR','2019-11-30 11:41:32'),(13,5,2,'AND','2019-11-30 12:06:35'),(14,5,8,'OR','2019-11-30 11:41:32'),(15,5,9,'OR','2019-11-30 11:41:32'),(16,5,10,'OR','2019-11-30 11:41:32'),(17,5,11,'OR','2019-11-30 11:41:32'),(18,6,14,'OR','2019-11-30 11:41:32'),(19,6,15,'OR','2019-11-30 11:41:32'),(20,6,16,'OR','2019-11-30 11:41:32'),(21,6,2,'AND','2019-11-30 12:06:35'),(22,6,4,'AND','2019-11-30 12:06:35'),(23,7,3,'AND','2019-11-30 12:06:35'),(24,7,17,'AND','2019-11-30 12:06:35'),(25,8,18,'OR','2019-11-30 14:39:27'),(26,8,19,'OR','2019-11-30 14:39:27'),(27,11,20,'AND','2019-11-30 12:16:14');";
        $sql2 = "INSERT INTO `requirement_master` (`id`, `requirement_name`, `group_name`, `status`, `ts`) VALUES (1,'Property Insurance','Insurance',1,'2019-11-30 09:10:55'),(2,'Driver\'s license','Insurance',1,'2019-11-30 09:10:55'),(3,'Liability Insurance.','Insurance',1,'2019-11-30 09:10:55'),(4,'Motorcycle Insurance','Insurance',1,'2019-11-30 09:10:55'),(5,'Apartment','Home',1,'2019-11-30 09:10:55'),(6,'Flat','Home',1,'2019-11-30 09:10:55'),(7,'House','Home',1,'2019-11-30 09:10:55'),(8,'2 Door Car','4 Wheeler',1,'2019-11-30 09:10:55'),(9,'3 Door Car','4 Wheeler',1,'2019-11-30 09:10:55'),(10,'4 Door Car','4 Wheeler',1,'2019-11-30 09:10:55'),(11,'5 Door Car','4 Wheeler',1,'2019-11-30 09:10:55'),(12,'Social Security Number','Other',1,'2019-11-30 09:10:55'),(13,'Work permit','Other',1,'2019-11-30 09:10:55'),(14,'Scooter','2 Wheeler',1,'2019-11-30 09:10:55'),(15,'Bike','2 Wheeler',1,'2019-11-30 09:10:55'),(16,'Motorcycle ','2 Wheeler',1,'2019-11-30 09:10:55'),(17,'Massage Qualification Certificate','Other',1,'2019-11-30 09:10:55'),(18,'Storage place','Storage',1,'2019-11-30 09:10:55'),(19,'Garage','Storage',1,'2019-11-30 09:10:55'),(20,'PayPal Account.','payment gateway',1,'2019-11-30 09:10:55'),(21,'Car insurance','Insurance',1,'2019-11-30 11:28:48');";
        $this->addSql($sql);
        $this->addSql($sql1);
        $this->addSql($sql2);
        

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
