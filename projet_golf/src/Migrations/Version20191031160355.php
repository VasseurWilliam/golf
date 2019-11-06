<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191031160355 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition ADD heure_debut TIME NOT NULL, ADD decalage_depart TIME NOT NULL, ADD trou1 TIME NOT NULL, ADD trou2 TIME NOT NULL, ADD trou3 TIME NOT NULL, ADD trou4 TIME NOT NULL, ADD trou5 TIME NOT NULL, ADD trou6 TIME NOT NULL, ADD trou7 TIME NOT NULL, ADD trou8 TIME NOT NULL, ADD trou9 TIME NOT NULL, ADD trou10 TIME NOT NULL, ADD trou11 TIME NOT NULL, ADD trou12 TIME NOT NULL, ADD trou13 TIME NOT NULL, ADD trou14 TIME NOT NULL, ADD trou15 TIME NOT NULL, ADD trou16 TIME NOT NULL, ADD trou17 TIME NOT NULL, ADD trou18 TIME NOT NULL, DROP heureDebut, DROP decalageDepart');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition ADD heureDebut TIME NOT NULL, ADD decalageDepart TIME NOT NULL, DROP heure_debut, DROP decalage_depart, DROP trou1, DROP trou2, DROP trou3, DROP trou4, DROP trou5, DROP trou6, DROP trou7, DROP trou8, DROP trou9, DROP trou10, DROP trou11, DROP trou12, DROP trou13, DROP trou14, DROP trou15, DROP trou16, DROP trou17, DROP trou18');
    }
}
