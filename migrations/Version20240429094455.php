<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429094455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colour (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, featured_colour_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, active BOOLEAN NOT NULL, CONSTRAINT FK_D34A04ADEFC1BA1 FOREIGN KEY (featured_colour_id) REFERENCES colour (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D34A04ADEFC1BA1 ON product (featured_colour_id)');
        $this->addSql('CREATE TABLE product_colour (product_id INTEGER NOT NULL, colour_id INTEGER NOT NULL, PRIMARY KEY(product_id, colour_id), CONSTRAINT FK_9884246A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9884246A569C9B4C FOREIGN KEY (colour_id) REFERENCES colour (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_9884246A4584665A ON product_colour (product_id)');
        $this->addSql('CREATE INDEX IDX_9884246A569C9B4C ON product_colour (colour_id)');
        $this->addSql('INSERT INTO colour (name) values ("black"), ("white")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE colour');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_colour');
    }
}
