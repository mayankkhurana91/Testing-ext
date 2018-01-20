<?php
namespace PingReceiveExtention\Testing\Controller;

/***
 *
 * This file is part of the "PingReceiveExtention" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * OrderController
 */
class OrderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * orderRepository
     *
     * @var \PingReceiveExtention\Testing\Domain\Repository\OrderRepository
     * @inject
     */
    protected $orderRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $orders = $this->orderRepository->findAll();
        $this->view->assign('orders', $orders);
    }

    /**
     * action show
     *
     * @param \PingReceiveExtention\Testing\Domain\Model\Order $order
     * @return void
     */
    public function showAction(\PingReceiveExtention\Testing\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \PingReceiveExtention\Testing\Domain\Model\Order $newOrder
     * @return void
     */
    public function createAction(\PingReceiveExtention\Testing\Domain\Model\Order $newOrder)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->add($newOrder);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \PingReceiveExtention\Testing\Domain\Model\Order $order
     * @ignorevalidation $order
     * @return void
     */
    public function editAction(\PingReceiveExtention\Testing\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
    }

    /**
     * action update
     *
     * @param \PingReceiveExtention\Testing\Domain\Model\Order $order
     * @return void
     */
    public function updateAction(\PingReceiveExtention\Testing\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->update($order);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \PingReceiveExtention\Testing\Domain\Model\Order $order
     * @return void
     */
    public function deleteAction(\PingReceiveExtention\Testing\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->remove($order);
        $this->redirect('list');
    }

    /**
     * action
     *
     * @return void
     */
    public function Action()
    {

    }
}
