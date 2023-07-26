<?php

namespace HarriesCC\Kuaidi100\Models;

class Man {
    protected string $name;

    protected string $mobile;

    protected string $tel;

    protected string $printAddr;

    protected string $company;


    public function __construct($name, $mobile, $printAddr)
    {
        $this->name = $name;
        $this->mobile = $mobile;
        $this->printAddr = $printAddr;
    }

    /**
     * @param string $mobile
     * @return Man
     */
    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @param string $name
     * @return Man
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $printAddr
     */
    public function setPrintAddr(string $printAddr): self
    {
        $this->printAddr = $printAddr;
        return $this;
    }

    /**
     * @param string $company
     * @return Man
     */
    public function setCompany(string $company): self
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @param string $tel
     * @return Man
     */
    public function setTel(string $tel): self
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPrintAddr(): string
    {
        return $this->printAddr;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    function toArray(): array {

        $array = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'printAddr' => $this->printAddr
        ];

        if (!empty($this->tel)) {
            $array['tel'] = $this->tel;
        }

        if (!empty($this->company)) {
            $array['company'] = $this->company;
        }

        return $array;
    }
}