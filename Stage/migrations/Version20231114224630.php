<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114224630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE communaute (community_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, UNIQUE INDEX name (name), PRIMARY KEY(community_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE onboarding (onborading_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, community_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(50) DEFAULT \'NULL\', img_url VARCHAR(50) DEFAULT \'NULL\', description TEXT NOT NULL, prerequisites VARCHAR(1000) DEFAULT \'NULL\', level VARCHAR(50) NOT NULL, tag VARCHAR(255) DEFAULT \'NULL\', is_published TINYINT(1) NOT NULL, average_notation TINYINT(1) DEFAULT NULL, INDEX user_id (user_id), INDEX community_id (community_id), UNIQUE INDEX slug (slug), PRIMARY KEY(onborading_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutorial (tutorial_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT \'NULL\', img_url VARCHAR(255) DEFAULT \'NULL\', description VARCHAR(1000) NOT NULL, duration_time INT NOT NULL, level VARCHAR(50) NOT NULL, tag VARCHAR(255) DEFAULT \'NULL\', content LONGTEXT DEFAULT NULL, is_published TINYINT(1) NOT NULL, INDEX user_id (user_id), UNIQUE INDEX slug (slug), PRIMARY KEY(tutorial_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appartenir (tutorial_id INT NOT NULL, onborading_id INT NOT NULL, INDEX IDX_A2A0D90C89366B7B (tutorial_id), INDEX IDX_A2A0D90C4425E15D (onborading_id), PRIMARY KEY(tutorial_id, onborading_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (user_id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, birthday DATE NOT NULL, email VARCHAR(50) NOT NULL, address VARCHAR(50) NOT NULL, telephone VARCHAR(50) NOT NULL, roles JSON NOT NULL, password VARCHAR(50) NOT NULL, createdAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updatedAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX email (email), PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lier_ (user_id INT NOT NULL, community_id INT NOT NULL, INDEX IDX_740F8B02A76ED395 (user_id), INDEX IDX_740F8B02FDA7B0BF (community_id), PRIMARY KEY(user_id, community_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE onboarding ADD CONSTRAINT FK_23A7BB0EA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (user_id)');
        $this->addSql('ALTER TABLE onboarding ADD CONSTRAINT FK_23A7BB0EFDA7B0BF FOREIGN KEY (community_id) REFERENCES communaute (community_id)');
        $this->addSql('ALTER TABLE tutorial ADD CONSTRAINT FK_C66BFFE9A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (user_id)');
        $this->addSql('ALTER TABLE appartenir ADD CONSTRAINT FK_A2A0D90C89366B7B FOREIGN KEY (tutorial_id) REFERENCES tutorial (tutorial_id)');
        $this->addSql('ALTER TABLE appartenir ADD CONSTRAINT FK_A2A0D90C4425E15D FOREIGN KEY (onborading_id) REFERENCES onboarding (onborading_id)');
        $this->addSql('ALTER TABLE lier_ ADD CONSTRAINT FK_740F8B02A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (user_id)');
        $this->addSql('ALTER TABLE lier_ ADD CONSTRAINT FK_740F8B02FDA7B0BF FOREIGN KEY (community_id) REFERENCES communaute (community_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE onboarding DROP FOREIGN KEY FK_23A7BB0EA76ED395');
        $this->addSql('ALTER TABLE onboarding DROP FOREIGN KEY FK_23A7BB0EFDA7B0BF');
        $this->addSql('ALTER TABLE tutorial DROP FOREIGN KEY FK_C66BFFE9A76ED395');
        $this->addSql('ALTER TABLE appartenir DROP FOREIGN KEY FK_A2A0D90C89366B7B');
        $this->addSql('ALTER TABLE appartenir DROP FOREIGN KEY FK_A2A0D90C4425E15D');
        $this->addSql('ALTER TABLE lier_ DROP FOREIGN KEY FK_740F8B02A76ED395');
        $this->addSql('ALTER TABLE lier_ DROP FOREIGN KEY FK_740F8B02FDA7B0BF');
        $this->addSql('DROP TABLE communaute');
        $this->addSql('DROP TABLE onboarding');
        $this->addSql('DROP TABLE tutorial');
        $this->addSql('DROP TABLE appartenir');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE lier_');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
