<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920075017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE question_system (question_id INT NOT NULL, system_id INT NOT NULL, PRIMARY KEY(question_id, system_id))');
        $this->addSql('CREATE INDEX IDX_CE103E831E27F6BF ON question_system (question_id)');
        $this->addSql('CREATE INDEX IDX_CE103E83D0952FA5 ON question_system (system_id)');
        $this->addSql('ALTER TABLE question_system ADD CONSTRAINT FK_CE103E831E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_system ADD CONSTRAINT FK_CE103E83D0952FA5 FOREIGN KEY (system_id) REFERENCES system (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question_system DROP CONSTRAINT FK_CE103E831E27F6BF');
        $this->addSql('ALTER TABLE question_system DROP CONSTRAINT FK_CE103E83D0952FA5');
        $this->addSql('DROP TABLE question_system');
    }
}
