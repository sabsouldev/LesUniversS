<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715223004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alt_text VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD featured_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E663569D950 FOREIGN KEY (featured_image_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_23A0E663569D950 ON article (featured_image_id)');
        $this->addSql('ALTER TABLE partenaires ADD featured_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaires ADD CONSTRAINT FK_D230102E3569D950 FOREIGN KEY (featured_image_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_D230102E3569D950 ON partenaires (featured_image_id)');
        $this->addSql('ALTER TABLE podcast ADD featured_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE podcast ADD CONSTRAINT FK_D7E805BD3569D950 FOREIGN KEY (featured_image_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_D7E805BD3569D950 ON podcast (featured_image_id)');
        $this->addSql('ALTER TABLE presse ADD featured_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE presse ADD CONSTRAINT FK_5A7771173569D950 FOREIGN KEY (featured_image_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_5A7771173569D950 ON presse (featured_image_id)');
        $this->addSql('ALTER TABLE projet ADD featured_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA93569D950 FOREIGN KEY (featured_image_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_50159CA93569D950 ON projet (featured_image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E663569D950');
        $this->addSql('ALTER TABLE partenaires DROP FOREIGN KEY FK_D230102E3569D950');
        $this->addSql('ALTER TABLE podcast DROP FOREIGN KEY FK_D7E805BD3569D950');
        $this->addSql('ALTER TABLE presse DROP FOREIGN KEY FK_5A7771173569D950');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA93569D950');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP INDEX IDX_23A0E663569D950 ON article');
        $this->addSql('ALTER TABLE article DROP featured_image_id');
        $this->addSql('DROP INDEX IDX_D230102E3569D950 ON partenaires');
        $this->addSql('ALTER TABLE partenaires DROP featured_image_id');
        $this->addSql('DROP INDEX IDX_D7E805BD3569D950 ON podcast');
        $this->addSql('ALTER TABLE podcast DROP featured_image_id');
        $this->addSql('DROP INDEX IDX_5A7771173569D950 ON presse');
        $this->addSql('ALTER TABLE presse DROP featured_image_id');
        $this->addSql('DROP INDEX IDX_50159CA93569D950 ON projet');
        $this->addSql('ALTER TABLE projet DROP featured_image_id');
    }
}
