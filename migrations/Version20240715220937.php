<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715220937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE podcast (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, featured_text VARCHAR(100) DEFAULT NULL, lien_fichier VARCHAR(255) DEFAULT NULL, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE podcast_category (podcast_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_E633B1E8786136AB (podcast_id), INDEX IDX_E633B1E812469DE2 (category_id), PRIMARY KEY(podcast_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presse (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, featurd_text VARCHAR(100) DEFAULT NULL, lien_fichier VARCHAR(255) DEFAULT NULL, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presse_category (presse_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_40D2723876DDCB7 (presse_id), INDEX IDX_40D272312469DE2 (category_id), PRIMARY KEY(presse_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE podcast_category ADD CONSTRAINT FK_E633B1E8786136AB FOREIGN KEY (podcast_id) REFERENCES podcast (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE podcast_category ADD CONSTRAINT FK_E633B1E812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE presse_category ADD CONSTRAINT FK_40D2723876DDCB7 FOREIGN KEY (presse_id) REFERENCES presse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE presse_category ADD CONSTRAINT FK_40D272312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE podcast_category DROP FOREIGN KEY FK_E633B1E8786136AB');
        $this->addSql('ALTER TABLE podcast_category DROP FOREIGN KEY FK_E633B1E812469DE2');
        $this->addSql('ALTER TABLE presse_category DROP FOREIGN KEY FK_40D2723876DDCB7');
        $this->addSql('ALTER TABLE presse_category DROP FOREIGN KEY FK_40D272312469DE2');
        $this->addSql('DROP TABLE podcast');
        $this->addSql('DROP TABLE podcast_category');
        $this->addSql('DROP TABLE presse');
        $this->addSql('DROP TABLE presse_category');
    }
}
