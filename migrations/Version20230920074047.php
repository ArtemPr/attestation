<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920074047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE level DROP CONSTRAINT fk_9aeacc131e27f6bf');
        $this->addSql('DROP INDEX idx_9aeacc131e27f6bf');
        $this->addSql('ALTER TABLE level DROP question_id');
        $this->addSql('ALTER TABLE system DROP CONSTRAINT fk_c94d118b1e27f6bf');
        $this->addSql('DROP INDEX idx_c94d118b1e27f6bf');
        $this->addSql('ALTER TABLE system DROP question_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE level ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE level ADD CONSTRAINT fk_9aeacc131e27f6bf FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9aeacc131e27f6bf ON level (question_id)');
        $this->addSql('ALTER TABLE system ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE system ADD CONSTRAINT fk_c94d118b1e27f6bf FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_c94d118b1e27f6bf ON system (question_id)');
    }
}
