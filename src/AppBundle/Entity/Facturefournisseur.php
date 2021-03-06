<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Facturefournisseur
 *
 * @ORM\Table(name="facture_fournisseur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FacturefournisseurRepository")
 */
class Facturefournisseur
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="achatHT", type="float", nullable=true)
     */
    private $achatHT;
    /**
     * @var integer
     *
     * @ORM\Column(name="nb_jours", type="integer", nullable=true)
     */
    private $nbjours;
    /**
     * @var integer
     *
     * @ORM\Column(name="mois", type="integer", nullable=true)
     */
    private $mois;
    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;
    /**
     * @var float
     *
     * @ORM\Column(name="achatTTC", type="float", nullable=true)
     */
    private $achatTTC;
    /**
     * @var float
     *
     * @ORM\Column(name="taxe", type="float", nullable=true)
     */
    private $taxe;

    /**
     * @var string
     *
     * @ORM\Column(name="factureFournisseur", type="string", length=255, nullable=true)
     */
    private $factureFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date",nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Fournisseur", inversedBy="facturefournisseurs")
     * @ORM\JoinColumn(name="id_fournisseur", referencedColumnName="id")
     */
    private $fournisseur;
    /**
     * @ORM\ManyToOne(targetEntity="Bcfournisseur", inversedBy="facturefournisseurs")
     * @ORM\JoinColumn(name="id_bcfournisseur", referencedColumnName="id")
     */
    private $bcfournisseur;
    /**
     * @ORM\ManyToOne(targetEntity="Mission", inversedBy="facturefournisseurs")
     * @ORM\JoinColumn(name="id_mission", referencedColumnName="id")
     */
    private $mission;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Virement", mappedBy="facturefournisseur",cascade={"persist", "remove"})
     */
    private $virements;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set achat
     *
     * @param float $achat
     *
     * @return Bcfournisseur
     */
    public function setAchat($achat)
    {
        $this->achat = $achat;

        return $this;
    }

    /**
     * Get achat
     *
     * @return float
     */
    public function getAchat()
    {
        return $this->achat;
    }

    /**
     * Set factureFournisseur
     *
     * @param string $factureFournisseur
     *
     * @return Bcfournisseur
     */
    public function setFacturefournisseur($factureFournisseur)
    {
        $this->factureFournisseur = $factureFournisseur;

        return $this;
    }

    /**
     * Get factureFournisseur
     *
     * @return string
     */
    public function getFacturefournisseur()
    {
        return $this->factureFournisseur;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Bcfournisseur
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bcfournisseur
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="document_path", fileNameProperty="documentName")
     *
     * @var File
     */
    private $documentFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $documentName;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $document
     */
    public function setDocumentFile(?File $document = null): void
    {
        $this->documentFile = $document;

        if (null !== $document) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getDocumentFile(): ?File
    {
        return $this->documentFile;
    }

    public function setDocumentName(?string $documentName): void
    {
        $this->documentName = $documentName;
    }

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ceation", type="datetime", nullable=true)
     */
    private $createdAt;


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Bcfournisseur
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Bcfournisseur
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

    /**
     * Set fournisseur
     *
     * @param \AppBundle\Entity\Fournisseur $fournisseur
     *
     * @return Bcfournisseur
     */
    public function setFournisseur(\AppBundle\Entity\Fournisseur $fournisseur = null)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return \AppBundle\Entity\Fournisseur
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->virments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add virment
     *
     * @param \AppBundle\Entity\Virement $virment
     *
     * @return Bcfournisseur
     */
    public function addVirment(\AppBundle\Entity\Virement $virment)
    {
        $this->virments[] = $virment;

        return $this;
    }

    /**
     * Remove virment
     *
     * @param \AppBundle\Entity\Virement $virment
     */
    public function removeVirment(\AppBundle\Entity\Virement $virment)
    {
        $this->virments->removeElement($virment);
    }

    /**
     * Get virments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVirments()
    {
        return $this->virments;
    }

    public function __toString()
    {
        return $this->getFournisseur()->getNom().'--'.$this->getMois().'/'.$this->getYear();
    }

    /**
     * Set achatHT
     *
     * @param float $achatHT
     *
     * @return Bcfournisseur
     */
    public function setAchatHT($achatHT)
    {
        $this->achatHT = $achatHT;

        return $this;
    }

    /**
     * Get achatHT
     *
     * @return float
     */
    public function getAchatHT()
    {
        return $this->achatHT;
    }

    /**
     * Set achatTTC
     *
     * @param float $achatTTC
     *
     * @return Bcfournisseur
     */
    public function setAchatTTC($achatTTC)
    {
        $this->achatTTC = $achatTTC;

        return $this;
    }

    /**
     * Get achatTTC
     *
     * @return float
     */
    public function getAchatTTC()
    {
        return $this->achatTTC;
    }

    /**
     * Set taxe
     *
     * @param float $taxe
     *
     * @return Bcfournisseur
     */
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;

        return $this;
    }

    /**
     * Get taxe
     *
     * @return float
     */
    public function getTaxe()
    {
        return $this->taxe;
    }

    /**
     * Set nbjours
     *
     * @param integer $nbjours
     *
     * @return Bcfournisseur
     */
    public function setNbjours($nbjours)
    {
        $this->nbjours = $nbjours;

        return $this;
    }

    /**
     * Get nbjours
     *
     * @return integer
     */
    public function getNbjours()
    {
        return $this->nbjours;
    }

    /**
     * Set mois
     *
     * @param integer $mois
     *
     * @return Bcfournisseur
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return integer
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Bcfournisseur
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set mission
     *
     * @param \AppBundle\Entity\Mission $mission
     *
     * @return Bcfournisseur
     */
    public function setMission(\AppBundle\Entity\Mission $mission = null)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return \AppBundle\Entity\Mission
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Add virement
     *
     * @param \AppBundle\Entity\Virement $virement
     *
     * @return Bcfournisseur
     */
    public function addVirement(\AppBundle\Entity\Virement $virement)
    {
        $this->virements[] = $virement;

        return $this;
    }

    /**
     * Remove virement
     *
     * @param \AppBundle\Entity\Virement $virement
     */
    public function removeVirement(\AppBundle\Entity\Virement $virement)
    {
        $this->virements->removeElement($virement);
    }

    /**
     * Get virements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVirements()
    {
        return $this->virements;
    }

    /**
     * Get virement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVirement()
    {
        return $this->virement;
    }

    /**
     * Set bcfournisseur
     *
     * @param \AppBundle\Entity\Bcfournisseur $bcfournisseur
     *
     * @return Facturefournisseur
     */
    public function setBcfournisseur(\AppBundle\Entity\Bcfournisseur $bcfournisseur = null)
    {
        $this->bcfournisseur = $bcfournisseur;

        return $this;
    }

    /**
     * Get bcfournisseur
     *
     * @return \AppBundle\Entity\Bcfournisseur
     */
    public function getBcfournisseur()
    {
        return $this->bcfournisseur;
    }
}
