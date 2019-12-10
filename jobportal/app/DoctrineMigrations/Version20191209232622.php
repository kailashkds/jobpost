<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20191209232622 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE requirement_job CHANGE job_id job_id INT NOT NULL');
        $this->addSql('ALTER TABLE requirement_job ADD CONSTRAINT FK_5E163B9BBE04EA9 FOREIGN KEY (job_id) REFERENCES job_details (id)');
        $this->addSql('ALTER TABLE requirement_job ADD CONSTRAINT FK_5E163B9B2AD7EE13 FOREIGN KEY (requirement_master_id) REFERENCES requirement_master (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE requirement_job DROP FOREIGN KEY FK_5E163B9BBE04EA9');
        $this->addSql('ALTER TABLE requirement_job DROP FOREIGN KEY FK_5E163B9B2AD7EE13');
        $this->addSql('ALTER TABLE requirement_job CHANGE job_id job_id INT DEFAULT NULL');
    }
}
