<?php declare(strict_types=1);

namespace MaxServ\Bug\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Bug extends AbstractEntity
{
    protected string $title;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
