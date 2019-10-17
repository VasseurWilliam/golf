<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191016132101 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition ADD golf_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1F1503E2B FOREIGN KEY (golf_id) REFERENCES golf (id)');
        $this->addSql('CREATE INDEX IDX_B50A2CB1F1503E2B ON competition (golf_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1F1503E2B');
        $this->addSql('DROP INDEX IDX_B50A2CB1F1503E2B ON competition');
        $this->addSql('ALTER TABLE competition DROP golf_id');
    }
}
