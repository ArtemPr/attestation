<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920081518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE attestation_question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE attestation_question (id INT NOT NULL, result BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE attestation ADD attestation_question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attestation ADD CONSTRAINT FK_326EC63FA0D2D790 FOREIGN KEY (attestation_question_id) REFERENCES attestation_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_326EC63FA0D2D790 ON attestation (attestation_question_id)');
        $this->addSql('ALTER TABLE question ADD attestation_question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EA0D2D790 FOREIGN KEY (attestation_question_id) REFERENCES attestation_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B6F7494EA0D2D790 ON question (attestation_question_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE attestation DROP CONSTRAINT FK_326EC63FA0D2D790');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT FK_B6F7494EA0D2D790');
        $this->addSql('DROP SEQUENCE attestation_question_id_seq CASCADE');
        $this->addSql('DROP TABLE attestation_question');
        $this->addSql('DROP INDEX IDX_B6F7494EA0D2D790');
        $this->addSql('ALTER TABLE question DROP attestation_question_id');
        $this->addSql('DROP INDEX IDX_326EC63FA0D2D790');
        $this->addSql('ALTER TABLE attestation DROP attestation_question_id');
    }
}
