<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181020122514 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commission (id INT AUTO_INCREMENT NOT NULL, campaign_id INT NOT NULL, remote_id VARCHAR(255) NOT NULL, remote_action_id VARCHAR(255) NOT NULL, amount INT NOT NULL, INDEX IDX_1C650158F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_collection (id INT AUTO_INCREMENT NOT NULL, progress INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, commission_id INT NOT NULL, task_collection_id INT NOT NULL, new_status VARCHAR(255) NOT NULL, amount INT NOT NULL, message VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_527EDB25202D1EB2 (commission_id), INDEX IDX_527EDB25145E9BAC (task_collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commission ADD CONSTRAINT FK_1C650158F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25202D1EB2 FOREIGN KEY (commission_id) REFERENCES commission (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25145E9BAC FOREIGN KEY (task_collection_id) REFERENCES task_collection (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25202D1EB2');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25145E9BAC');
        $this->addSql('DROP TABLE commission');
        $this->addSql('DROP TABLE task_collection');
        $this->addSql('DROP TABLE task');
    }
}
