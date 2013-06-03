<?php

namespace Vct\VpnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TPaypal
 *
 * @ORM\Table(name="t_paypal")
 * @ORM\Entity
 */
class TPaypal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=32, nullable=true)
     */
    private $userEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paid_date", type="date", nullable=true)
     */
    private $paidDate;

    /**
     * @var float
     *
     * @ORM\Column(name="paid_fee", type="float", nullable=true)
     */
    private $paidFee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="date", nullable=true)
     */
    private $createTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_time", type="date", nullable=true)
     */
    private $updateTime;



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
     * Set userEmail
     *
     * @param string $userEmail
     * @return TPaypal
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set paidDate
     *
     * @param \DateTime $paidDate
     * @return TPaypal
     */
    public function setPaidDate($paidDate)
    {
        $this->paidDate = $paidDate;

        return $this;
    }

    /**
     * Get paidDate
     *
     * @return \DateTime 
     */
    public function getPaidDate()
    {
        return $this->paidDate;
    }

    /**
     * Set paidFee
     *
     * @param float $paidFee
     * @return TPaypal
     */
    public function setPaidFee($paidFee)
    {
        $this->paidFee = $paidFee;

        return $this;
    }

    /**
     * Get paidFee
     *
     * @return float 
     */
    public function getPaidFee()
    {
        return $this->paidFee;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return TPaypal
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     * @return TPaypal
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime 
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}
