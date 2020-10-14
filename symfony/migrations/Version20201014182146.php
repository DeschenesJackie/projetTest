<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201014182146 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weather_report (id INT AUTO_INCREMENT NOT NULL, timezone VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, lon DOUBLE PRECISION NOT NULL, date_time VARCHAR(20) NOT NULL, sunrise VARCHAR(8) NOT NULL, sunset VARCHAR(8) NOT NULL, temp DOUBLE PRECISION NOT NULL, real_feel DOUBLE PRECISION NOT NULL, humidity INT NOT NULL, clouds INT NOT NULL, winds DOUBLE PRECISION NOT NULL, conditions LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE weather_report');
    }
}
