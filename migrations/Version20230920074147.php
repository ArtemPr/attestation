<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920074147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question ADD level_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD system_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ED0952FA5 FOREIGN KEY (system_id) REFERENCES system (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B6F7494E5FB14BA7 ON question (level_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494ED0952FA5 ON question (system_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT FK_B6F7494E5FB14BA7');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT FK_B6F7494ED0952FA5');
        $this->addSql('DROP INDEX IDX_B6F7494E5FB14BA7');
        $this->addSql('DROP INDEX IDX_B6F7494ED0952FA5');
        $this->addSql('ALTER TABLE question DROP level_id');
        $this->addSql('ALTER TABLE question DROP system_id');
    }
}
