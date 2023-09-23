<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920074929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP CONSTRAINT fk_b6f7494ed0952fa5');
        $this->addSql('DROP INDEX idx_b6f7494ed0952fa5');
        $this->addSql('ALTER TABLE question DROP system_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question ADD system_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT fk_b6f7494ed0952fa5 FOREIGN KEY (system_id) REFERENCES system (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b6f7494ed0952fa5 ON question (system_id)');
    }
}
