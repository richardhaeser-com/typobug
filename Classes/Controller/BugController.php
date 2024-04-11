<?php declare(strict_types=1);

namespace MaxServ\Bug\Controller;

use MaxServ\Bug\Domain\Model\Bug;
use MaxServ\Bug\Domain\Repository\BugRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extensionmanager\Controller\ActionController;

class BugController extends ActionController
{
    public function __construct(BugRepository $bugRepository) {}

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('bugs', $this->bugRepository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(Bug $bug): ResponseInterface
    {
        $this->view->assign('bug', $bug);
    }
}
