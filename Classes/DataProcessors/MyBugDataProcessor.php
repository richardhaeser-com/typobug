<?php

namespace MaxServ\Bug\DataProcessors;

use MaxServ\Bug\Domain\Repository\BugRepository;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use function array_key_exists;

class MyBugDataProcessor implements DataProcessorInterface
{
    public function __construct(protected BugRepository $bugRepository)
    {
    }

    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $querySettings = $this->bugRepository->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->bugRepository->setDefaultQuerySettings($querySettings);

        $variableName = array_key_exists('variableName' , $processorConfiguration) ? $processorConfiguration['variableName'] : 'bugs';
        $processedData[$variableName] = $this->bugRepository->findAll();
        return $processedData;
    }
}
