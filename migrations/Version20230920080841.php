<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920080841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE developers DROP CONSTRAINT fk_bb14eda7edc5b38');
        $this->addSql('DROP INDEX idx_bb14eda7edc5b38');
        $this->addSql('ALTER TABLE developers DROP attestation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE developers ADD attestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE developers ADD CONSTRAINT fk_bb14eda7edc5b38 FOREIGN KEY (attestation_id) REFERENCES attestation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_bb14eda7edc5b38 ON developers (attestation_id)');
    }
}
