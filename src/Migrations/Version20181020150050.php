<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181020150050 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commission CHANGE campaign_id campaign_id INT DEFAULT NULL, CHANGE remote_action_id remote_action_id VARCHAR(255) DEFAULT NULL, CHANGE amount amount INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task CHANGE commission_id commission_id INT DEFAULT NULL, CHANGE amount amount INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commission CHANGE campaign_id campaign_id INT NOT NULL, CHANGE remote_action_id remote_action_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE amount amount INT NOT NULL');
        $this->addSql('ALTER TABLE task CHANGE commission_id commission_id INT NOT NULL, CHANGE amount amount INT NOT NULL');
    }
}
