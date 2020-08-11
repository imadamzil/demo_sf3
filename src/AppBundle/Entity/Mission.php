<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Mission
 *
 * @ORM\Table(name="mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MissionRepository")
 * @Vich\Uploadable
 */
class Mission
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
     * @ORM\Column(name="prixVente", type="float", nullable=true)
     */
    private $prixVente;

    /**
     * @var string
     *
     * @ORM\Column(name="prixAchat", type="string", length=255, nullable=true)
     */
    private $prixAchat;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;
    /**
     * @var string
     *
     * @ORM\Column(name="devise", type="string", length=255, nullable=true)
     */
    private $devise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", nullable=true)
     */
    private $dateDebut;

    /**
     * @var date
     *
     * @ORM\Column(name="dateFin", type="datetime", nullable=true)
     */
    private $dateFin;


    /**
     * @ORM\ManyToOne(targetEntity="Bcclient", inversedBy="mission")
     * @ORM\JoinColumn(name="id_bcclient", referencedColumnName="id")
     */
    private $bcclient;
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="mission")
     * @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="Consultant", inversedBy="mission")
     * @ORM\JoinColumn(name="id_consultant", referencedColumnName="id")
     */
    private $consultant;
    /**
     * @ORM\ManyToOne(targetEntity="Fournisseur", inversedBy="mission")
     * @ORM\JoinColumn(name="id_fournisseur", referencedColumnName="id")
     */
    private $fournisseur;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ceation", type="datetime", nullable=true)
     */
    private $createdAt;
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="document_path", fileNameProperty="contratFName")
     *
     * @var File
     */
    private $contratFFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $contratFName;


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $contratF
     */
    public function setcontratFFile(?File $contratF = null): void
    {
        $this->contratFFile = $contratF;

        if (null !== $contratF) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getcontratFFile(): ?File
    {
        return $this->contratFFile;
    }

    public function setcontratFName(?string $contratFName): void
    {
        $this->contratFName = $contratFName;
    }

    public function getcontratFName(): ?string
    {
        return $this->contratFName;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="document_path", fileNameProperty="contratCName")
     *
     * @var File
     */
    private $contratCFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $contratCName;


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $contratC
     */
    public function setcontratCFile(?File $contratC = null): void
    {
        $this->contratCFile = $contratC;

        if (null !== $contratC) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getcontratCFile(): ?File
    {
        return $this->contratCFile;
    }

    public function setcontratCName(?string $contratCName): void
    {
        $this->contratCName = $contratCName;
    }

    public function getcontratCName(): ?string
    {
        return $this->contratCName;
    }


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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="document_path", fileNameProperty="bcName")
     *
     * @var File
     */
    private $bcFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $bcName;


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $bc
     */
    public function setBcFile(?File $bc = null): void
    {
        $this->bcFile = $bc;

        if (null !== $bc) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getBcFile(): ?File
    {
        return $this->bcFile;
    }

    public function setBcName(?string $bcName): void
    {
        $this->bcName = $bcName;
    }

    public function getBcName(): ?string
    {
        return $this->bcName;
    }

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
     * Set prixVente
     *
     * @param float $prixVente
     *
     * @return Mission
     */
    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    /**
     * Get prixVente
     *
     * @return float
     */
    public function getPrixVente()
    {
        return $this->prixVente;
    }

    /**
     * Set prixAchat
     *
     * @param string $prixAchat
     *
     * @return Mission
     */
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    /**
     * Get prixAchat
     *
     * @return string
     */
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Mission
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     *
     * @return Mission
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set contratFournisseur
     *
     * @param string $contratFournisseur
     *
     * @return Mission
     */
    public function setContratFournisseur($contratFournisseur)
    {
        $this->contratFournisseur = $contratFournisseur;

        return $this;
    }

    /**
     * Get contratFournisseur
     *
     * @return string
     */
    public function getContratFournisseur()
    {
        return $this->contratFournisseur;
    }

    /**
     * Set contratClient
     *
     * @param string $contratClient
     *
     * @return Mission
     */
    public function setContratClient($contratClient)
    {
        $this->contratClient = $contratClient;

        return $this;
    }

    /**
     * Get contratClient
     *
     * @return string
     */
    public function getContratClient()
    {
        return $this->contratClient;
    }

    /**
     * Set bcclient
     *
     * @param \AppBundle\Entity\Bcclient $bcclient
     *
     * @return Mission
     */
    public function setBcclient(\AppBundle\Entity\Bcclient $bcclient = null)
    {
        $this->bcclient = $bcclient;

        return $this;
    }

    /**
     * Get bcclient
     *
     * @return \AppBundle\Entity\Bcclient
     */
    public function getBcclient()
    {
        return $this->bcclient;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\client $client
     *
     * @return Mission
     */
    public function setClient(\AppBundle\Entity\client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set consultant
     *
     * @param \AppBundle\Entity\Consultant $consultant
     *
     * @return Mission
     */
    public function setConsultant(\AppBundle\Entity\Consultant $consultant = null)
    {
        $this->consultant = $consultant;

        return $this;
    }

    /**
     * Get consultant
     *
     * @return \AppBundle\Entity\Consultant
     */
    public function getConsultant()
    {
        return $this->consultant;
    }

    /**
     * Set fournisseur
     *
     * @param \AppBundle\Entity\Fournisseur $fournisseur
     *
     * @return Mission
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

    public function __construct()
    {

        $this->createdAt = new \DateTime('now');
    }

    public function __toString()
    {
        if ($this->getConsultant() != null) {

            return 'Mission-' . $this->getClient()->getNom() . '-' . $this->getConsultant()->getNom();
        }
        return 'Mission-' . $this->getClient()->getNom();

    }


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Mission
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
     * Set devise
     *
     * @param string $devise
     *
     * @return Mission
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return string
     */
    public function getDevise()
    {
        return $this->devise;
    }
}
