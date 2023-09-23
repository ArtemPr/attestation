<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920073854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE level ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE level ADD CONSTRAINT FK_9AEACC131E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9AEACC131E27F6BF ON level (question_id)');
        $this->addSql('ALTER TABLE question ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B6F7494EC54C8C93 ON question (type_id)');
        $this->addSql('ALTER TABLE system ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE system ADD CONSTRAINT FK_C94D118B1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C94D118B1E27F6BF ON system (question_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE level DROP CONSTRAINT FK_9AEACC131E27F6BF');
        $this->addSql('DROP INDEX IDX_9AEACC131E27F6BF');
        $this->addSql('ALTER TABLE level DROP question_id');
        $this->addSql('ALTER TABLE question DROP CONSTRAINT FK_B6F7494EC54C8C93');
        $this->addSql('DROP INDEX IDX_B6F7494EC54C8C93');
        $this->addSql('ALTER TABLE question DROP type_id');
        $this->addSql('ALTER TABLE system DROP CONSTRAINT FK_C94D118B1E27F6BF');
        $this->addSql('DROP INDEX IDX_C94D118B1E27F6BF');
        $this->addSql('ALTER TABLE system DROP question_id');
    }
}
