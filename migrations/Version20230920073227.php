<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920073227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE level_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE system_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE level (id INT NOT NULL, name VARCHAR(255) NOT NULL, level_index INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question (id INT NOT NULL, question VARCHAR(255) NOT NULL, answer TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE system (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE level_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE system_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_id_seq CASCADE');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE system');
        $this->addSql('DROP TABLE type');
    }
}
