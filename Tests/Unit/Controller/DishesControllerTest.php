<?php
namespace PingReceiveExtention\Testing\Tests\Unit\Controller;

/**
 * Test case.
 */
class DishesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \PingReceiveExtention\Testing\Controller\DishesController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\PingReceiveExtention\Testing\Controller\DishesController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllDishessFromRepositoryAndAssignsThemToView()
    {

        $allDishess = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dishesRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $dishesRepository->expects(self::once())->method('findAll')->will(self::returnValue($allDishess));
        $this->inject($this->subject, 'dishesRepository', $dishesRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('dishess', $allDishess);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDishesToView()
    {
        $dishes = new \PingReceiveExtention\Testing\Domain\Model\Dishes();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('dishes', $dishes);

        $this->subject->showAction($dishes);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenDishesToDishesRepository()
    {
        $dishes = new \PingReceiveExtention\Testing\Domain\Model\Dishes();

        $dishesRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $dishesRepository->expects(self::once())->method('add')->with($dishes);
        $this->inject($this->subject, 'dishesRepository', $dishesRepository);

        $this->subject->createAction($dishes);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenDishesToView()
    {
        $dishes = new \PingReceiveExtention\Testing\Domain\Model\Dishes();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('dishes', $dishes);

        $this->subject->editAction($dishes);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenDishesInDishesRepository()
    {
        $dishes = new \PingReceiveExtention\Testing\Domain\Model\Dishes();

        $dishesRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $dishesRepository->expects(self::once())->method('update')->with($dishes);
        $this->inject($this->subject, 'dishesRepository', $dishesRepository);

        $this->subject->updateAction($dishes);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenDishesFromDishesRepository()
    {
        $dishes = new \PingReceiveExtention\Testing\Domain\Model\Dishes();

        $dishesRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $dishesRepository->expects(self::once())->method('remove')->with($dishes);
        $this->inject($this->subject, 'dishesRepository', $dishesRepository);

        $this->subject->deleteAction($dishes);
    }
}
