<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920082255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attestation_question ADD attestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation_question ADD CONSTRAINT FK_474DDC837EDC5B38 FOREIGN KEY (attestation_id) REFERENCES attestation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_474DDC837EDC5B38 ON attestation_question (attestation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE attestation_question DROP CONSTRAINT FK_474DDC837EDC5B38');
        $this->addSql('DROP INDEX IDX_474DDC837EDC5B38');
        $this->addSql('ALTER TABLE attestation_question DROP attestation_id');
    }
}
