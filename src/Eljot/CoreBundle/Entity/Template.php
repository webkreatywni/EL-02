<?php

namespace Eljot\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eljot\CoreBundle\Entity\Template
 */
class Template
{
    const MESSAGE_TYPE = 'message_template';
    const EMAIL_TYPE = 'email_template';

    const MIGRATION_SUCCESS_MESSAGE = 'migration_success_message';
    const MIGRATION_SUCCESS_EMAIL= 'migration_success_email';

    private static $availableTypes = array(
        self::EMAIL_TYPE,
        self::MESSAGE_TYPE,
    );

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return Template
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Template
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Template
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set content
     *
     * @param text $content
     * @return Template
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

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
     * Returns available types
     * @return mixed
     */
    public static function getAvailableTypes($prefix = null)
    {
        $keys = array();
        $values = array();

        foreach (self::$availableTypes as $availableType) {
            $keys[] = $availableType;

            if (is_string($prefix)) {
                $values[] = $prefix . '.' . $availableType;
            } else {
                $values[] = $availableType;
            }
        }

        $result = array_combine($keys, $values);

        return $result;
    }
}