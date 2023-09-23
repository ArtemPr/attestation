<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920080905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attestation ADD developers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation ADD CONSTRAINT FK_326EC63F34C3944C FOREIGN KEY (developers_id) REFERENCES developers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_326EC63F34C3944C ON attestation (developers_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE attestation DROP CONSTRAINT FK_326EC63F34C3944C');
        $this->addSql('DROP INDEX IDX_326EC63F34C3944C');
        $this->addSql('ALTER TABLE attestation DROP developers_id');
    }
}
