<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191016133612 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE decalage_trou_partie ADD partie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE decalage_trou_partie ADD CONSTRAINT FK_A958D538E075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id)');
        $this->addSql('CREATE INDEX IDX_A958D538E075F7A4 ON decalage_trou_partie (partie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE decalage_trou_partie DROP FOREIGN KEY FK_A958D538E075F7A4');
        $this->addSql('DROP INDEX IDX_A958D538E075F7A4 ON decalage_trou_partie');
        $this->addSql('ALTER TABLE decalage_trou_partie DROP partie_id');
    }
}
