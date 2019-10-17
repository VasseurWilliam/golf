<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191016134334 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parcours ADD golf_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE3F1503E2B FOREIGN KEY (golf_id) REFERENCES golf (id)');
        $this->addSql('CREATE INDEX IDX_99B1DEE3F1503E2B ON parcours (golf_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE3F1503E2B');
        $this->addSql('DROP INDEX IDX_99B1DEE3F1503E2B ON parcours');
        $this->addSql('ALTER TABLE parcours DROP golf_id');
    }
}
