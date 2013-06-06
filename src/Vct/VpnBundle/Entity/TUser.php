<?php

namespace Vct\VpnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TUser
 *
 * @ORM\Table(name="t_user")
 * @ORM\Entity(repositoryClass="Vct\VpnBundle\Repository\TUserRepository")
 */
class TUser
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
     * @ORM\Column(name="vpn_server_id", type="string", length=32, nullable=true)
     */
    private $vpnServerId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=32, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=true)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date", type="date", nullable=true)
     */
    private $registerDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paid_date", type="date", nullable=true)
     */
    private $paidDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="paid_fee", type="integer", nullable=true)
     */
    private $paidFee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expire_date", type="date", nullable=true)
     */
    private $expireDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="expire_flag", type="boolean", nullable=true)
     */
    private $expireFlag;

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
     * Set vpnServerId
     *
     * @param string $vpnServerId
     * @return TUser
     */
    public function setVpnServerId($vpnServerId)
    {
        $this->vpnServerId = $vpnServerId;

        return $this;
    }

    /**
     * Get vpnServerId
     *
     * @return string 
     */
    public function getVpnServerId()
    {
        return $this->vpnServerId;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return TUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return TUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     * @return TUser
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set paidDate
     *
     * @param \DateTime $paidDate
     * @return TUser
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
     * @param integer $paidFee
     * @return TUser
     */
    public function setPaidFee($paidFee)
    {
        $this->paidFee = $paidFee;

        return $this;
    }

    /**
     * Get paidFee
     *
     * @return integer 
     */
    public function getPaidFee()
    {
        return $this->paidFee;
    }

    /**
     * Set expireDate
     *
     * @param \DateTime $expireDate
     * @return TUser
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * Get expireDate
     *
     * @return \DateTime 
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * Set expireFlag
     *
     * @param boolean $expireFlag
     * @return TUser
     */
    public function setExpireFlag($expireFlag)
    {
        $this->expireFlag = $expireFlag;

        return $this;
    }

    /**
     * Get expireFlag
     *
     * @return boolean 
     */
    public function getExpireFlag()
    {
        return $this->expireFlag;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return TUser
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
     * @return TUser
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
