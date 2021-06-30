<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629193808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, level_id INT DEFAULT NULL, user_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, INDEX IDX_C74404555FB14BA7 (level_id), UNIQUE INDEX UNIQ_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, freelance_id INT NOT NULL, client_id INT NOT NULL, reactivity INT NOT NULL, explanation INT NOT NULL, courtesy INT NOT NULL, recommandation INT NOT NULL, comment LONGTEXT DEFAULT NULL, created_at DATE DEFAULT NULL, INDEX IDX_9474526CE8DF656B (freelance_id), INDEX IDX_9474526C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE freelancer (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4C2ED1E8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gig (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, freelancer_id INT NOT NULL, gig_id INT NOT NULL, created_at DATE DEFAULT NULL, INDEX IDX_27BA704B19EB6921 (client_id), INDEX IDX_27BA704B8545BDF5 (freelancer_id), INDEX IDX_27BA704BFE058E5 (gig_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, from_freelancer_id INT NOT NULL, to_freelancer_id INT NOT NULL, subject VARCHAR(255) DEFAULT NULL, message LONGTEXT NOT NULL, sentdate DATE DEFAULT NULL, INDEX IDX_B6BD307FCC11BC62 (from_freelancer_id), INDEX IDX_B6BD307FAF4B6A9 (to_freelancer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404555FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE8DF656B FOREIGN KEY (freelance_id) REFERENCES freelancer (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE freelancer ADD CONSTRAINT FK_4C2ED1E8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B8545BDF5 FOREIGN KEY (freelancer_id) REFERENCES freelancer (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BFE058E5 FOREIGN KEY (gig_id) REFERENCES gig (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FCC11BC62 FOREIGN KEY (from_freelancer_id) REFERENCES freelancer (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FAF4B6A9 FOREIGN KEY (to_freelancer_id) REFERENCES freelancer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C19EB6921');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B19EB6921');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE8DF656B');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B8545BDF5');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FCC11BC62');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FAF4B6A9');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BFE058E5');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404555FB14BA7');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE freelancer DROP FOREIGN KEY FK_4C2ED1E8A76ED395');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE freelancer');
        $this->addSql('DROP TABLE gig');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE user');
    }
}
