<?php

namespace Eljot\ManagerBundle\Entity;

use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Eljot\ManagerBundle\Entity\ProductOrder
 */
class ProductOrder
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @GRID\Column(title="product_order.label.model", type="text", visible=true)
     * @var string $model
     */
    private $model;

    /**
     * @GRID\Column(title="product_order.label.ivoice", type="text", visible=true)
     * @var string $invoice
     */
    private $invoice;

    /**
     * @var string $ebay
     */
    private $ebay;

    /**
     * @var string $color
     */
    private $color;

    /**
     * @var boolean $is_seat
     */
    private $isSeat;

    /**
     * @var string $frame
     */
    private $frame;

    /**
     * @var text $extra
     */
    private $extra;

    /**
     * @var string $wheels
     */
    private $wheels;

    /**
     * @GRID\Column(title="product_order.label.client", type="text", visible=true)
     * @var string $client
     */
    private $client;

    /**
     * @GRID\Column(title="product_order.label.dateOfReceipt", type="date", visible=true, format="Y-m-d")
     * @var date $date_of_receipt
     */
    private $dateOfReceipt;

    /**
     * @GRID\Column(title="product_order.label.dateOfPayment", type="date", visible=true, format="Y-m-d")
     * @var date $date_of_payment
     */
    private $dateOfPayment;

    /**
     * @Gedmo\Timestampable(on="update")
     * @var time $update_time
     */
    private $updateTime;

    /**
     * @Gedmo\Timestampable(on="create")
     * @var time $insert_time
     */
    private $insertTime;

    /**
     * @GRID\Column(title="product_order.label.readyToReceipt", type="boolean", visible=true)
     * @var boolean $ready_to_receipt
     */
    private $readyToReceipt;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return ProductOrder
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set invoice
     *
     * @param string $invoice
     * @return ProductOrder
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * Get invoice
     *
     * @return string 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set ebay
     *
     * @param string $ebay
     * @return ProductOrder
     */
    public function setEbay($ebay)
    {
        $this->ebay = $ebay;
        return $this;
    }

    /**
     * Get ebay
     *
     * @return string 
     */
    public function getEbay()
    {
        return $this->ebay;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return ProductOrder
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set isSeat
     *
     * @param boolean $isSeat
     * @return ProductOrder
     */
    public function setIsSeat($isSeat)
    {
        $this->isSeat = $isSeat;
        return $this;
    }

    /**
     * Get isSeat
     *
     * @return boolean 
     */
    public function getIsSeat()
    {
        return $this->isSeat;
    }

    /**
     * Set frame
     *
     * @param string $frame
     * @return ProductOrder
     */
    public function setFrame($frame)
    {
        $this->frame = $frame;
        return $this;
    }

    /**
     * Get frame
     *
     * @return string 
     */
    public function getFrame()
    {
        return $this->frame;
    }

    /**
     * Set extra
     *
     * @param text $extra
     * @return ProductOrder
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }

    /**
     * Get extra
     *
     * @return text 
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set wheels
     *
     * @param string $wheels
     * @return ProductOrder
     */
    public function setWheels($wheels)
    {
        $this->wheels = $wheels;
        return $this;
    }

    /**
     * Get wheels
     *
     * @return string 
     */
    public function getWheels()
    {
        return $this->wheels;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return ProductOrder
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set dateOfReceipt
     *
     * @param date $dateOfReceipt
     * @return ProductOrder
     */
    public function setDateOfReceipt($dateOfReceipt)
    {
        $this->dateOfReceipt = $dateOfReceipt;
        return $this;
    }

    /**
     * Get dateOfReceipt
     *
     * @return date 
     */
    public function getDateOfReceipt()
    {
        return $this->dateOfReceipt;
    }

    /**
     * Set dateOfPayment
     *
     * @param date $dateOfPayment
     * @return ProductOrder
     */
    public function setDateOfPayment($dateOfPayment)
    {
        $this->dateOfPayment = $dateOfPayment;
        return $this;
    }

    /**
     * Get dateOfPayment
     *
     * @return date 
     */
    public function getDateOfPayment()
    {
        return $this->dateOfPayment;
    }

    /**
     * Set updateTime
     *
     * @param time $updateTime
     * @return ProductOrder
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
        return $this;
    }

    /**
     * Get updateTime
     *
     * @return time 
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * Set insertTime
     *
     * @param time $insertTime
     * @return ProductOrder
     */
    public function setInsertTime($insertTime)
    {
        $this->insertTime = $insertTime;
        return $this;
    }

    /**
     * Get insertTime
     *
     * @return time 
     */
    public function getInsertTime()
    {
        return $this->insertTime;
    }

    /**
     * Set readyToReceipt
     *
     * @param boolean $readyToReceipt
     * @return ProductOrder
     */
    public function setReadyToReceipt($readyToReceipt)
    {
        $this->readyToReceipt = $readyToReceipt;
        return $this;
    }

    /**
     * Get readyToReceipt
     *
     * @return boolean 
     */
    public function getReadyToReceipt()
    {
        return $this->readyToReceipt;
    }
    /**
     * @GRID\Column(title="product_order.label.uniqueCode", type="number", visible=true)
     * @var integer $unique_code
     */
    private $uniqueCode;


    /**
     * Set uniqueCode
     *
     * @param string $uniqueCode
     * @return ProductOrder
     */
    public function setUniqueCode($uniqueCode)
    {
        $this->uniqueCode = $uniqueCode;
        return $this;
    }

    /**
     * Get uniqueCode
     *
     * @return string 
     */
    public function getUniqueCode()
    {
        return $this->uniqueCode;
    }
}