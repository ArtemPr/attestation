<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920081713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attestation DROP CONSTRAINT fk_326ec63fa0d2d790');
        $this->addSql('DROP INDEX idx_326ec63fa0d2d790');
        $this->addSql('ALTER TABLE attestation DROP attestation_question_id');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT fk_b6f7494ea0d2d790');
        $this->addSql('DROP INDEX idx_b6f7494ea0d2d790');
        $this->addSql('ALTER TABLE question DROP attestation_question_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question ADD attestation_question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT fk_b6f7494ea0d2d790 FOREIGN KEY (attestation_question_id) REFERENCES attestation_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b6f7494ea0d2d790 ON question (attestation_question_id)');
        $this->addSql('ALTER TABLE attestation ADD attestation_question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation ADD CONSTRAINT fk_326ec63fa0d2d790 FOREIGN KEY (attestation_question_id) REFERENCES attestation_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_326ec63fa0d2d790 ON attestation (attestation_question_id)');
    }
}
