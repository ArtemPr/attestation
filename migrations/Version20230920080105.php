<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920080105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE developers_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE developers (id INT NOT NULL, name VARCHAR(255) NOT NULL, about TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE developers_system (developers_id INT NOT NULL, system_id INT NOT NULL, PRIMARY KEY(developers_id, system_id))');
        $this->addSql('CREATE INDEX IDX_F03967BA34C3944C ON developers_system (developers_id)');
        $this->addSql('CREATE INDEX IDX_F03967BAD0952FA5 ON developers_system (system_id)');
        $this->addSql('ALTER TABLE developers_system ADD CONSTRAINT FK_F03967BA34C3944C FOREIGN KEY (developers_id) REFERENCES developers (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE developers_system ADD CONSTRAINT FK_F03967BAD0952FA5 FOREIGN KEY (system_id) REFERENCES system (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE developers_id_seq CASCADE');
        $this->addSql('ALTER TABLE developers_system DROP CONSTRAINT FK_F03967BA34C3944C');
        $this->addSql('ALTER TABLE developers_system DROP CONSTRAINT FK_F03967BAD0952FA5');
        $this->addSql('DROP TABLE developers');
        $this->addSql('DROP TABLE developers_system');
    }
}
