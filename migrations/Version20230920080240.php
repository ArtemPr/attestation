<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920080240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE attestation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE attestation (id INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, result TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE developers ADD attestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE developers ADD CONSTRAINT FK_BB14EDA7EDC5B38 FOREIGN KEY (attestation_id) REFERENCES attestation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BB14EDA7EDC5B38 ON developers (attestation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE developers DROP CONSTRAINT FK_BB14EDA7EDC5B38');
        $this->addSql('DROP SEQUENCE attestation_id_seq CASCADE');
        $this->addSql('DROP TABLE attestation');
        $this->addSql('DROP INDEX IDX_BB14EDA7EDC5B38');
        $this->addSql('ALTER TABLE developers DROP attestation_id');
    }
}
