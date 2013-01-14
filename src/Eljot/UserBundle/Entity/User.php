<?php

namespace Eljot\UserBundle\Entity;

use APY\DataGridBundle\Grid\Mapping as GRID;

use FOS\UserBundle\Model\User as baseUser;

class User extends baseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_BASE = 'ROLE_BASE';

    protected static $availableRoles = array(
        self::ROLE_ADMIN,
        self::ROLE_BASE,
    );

    protected static $availableRolesNames = array(
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_BASE => 'Default',
    );

    /**
     * @GRID\Source(columns="id")
     * @GRID\Column(title="user.label.last_update", type="datetime", visible=false)
     *
     * @var \DateTime $lastUpdate
     */
    private $lastUpdate;

    /**
     * @GRID\Column(title="user.label.last_batch", field="lastBatch", type="text", visible=false)
     * @var \DateTime $lastBatch
     */
    private $lastBatch;

    /**
     * @GRID\Column(title="user.label.created_at", type="datetime", visible=false)
     * @var \DateTime $createdAt
     */
    private $createdAt;

    public function __construct()
    {
        parent::__construct();

        $this->lastUpdate = new \DateTime();
        $this->createdAt = new \DateTime();
        $this->approved = false;
    }

    /**
     * Set lastUpdate
     *
     * @param  \DateTime $lastUpdate
     * @return User
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Set lastBatch
     *
     * @param  \DateTime $lastBatch
     * @return User
     */
    public function setLastBatch($lastBatch)
    {
        $this->lastBatch = $lastBatch;

        return $this;
    }

    /**
     * Get lastBatch
     *
     * @return \DateTime
     */
    public function getLastBatch()
    {
        return $this->lastBatch;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public static function getRolesWithNames()
    {
        return self::$availableRolesNames;
    }
}