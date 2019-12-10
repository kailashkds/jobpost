<?php

namespace JobPostBundle\Controller;

use JobPostBundle\Entity\RequirementJob;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use JobPostBundle\Entity\JobDetails;
use JobPostBundle\Entity\RequirementMaster;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Requirementjob controller.
 *
 * @Route("jobpost/requirementjob")
 */
class RequirementJobController extends Controller
{
    /**
     * Lists all requirementJob entities.
     *
     * @Route("/{id}", name="jobpost_requirementjob_index")
     * @Method("GET")
     */
    public function indexAction(JobDetails $jobDetails)
    {
        $em = $this->getDoctrine()->getManager();

        $requirementJobs = $em->getRepository('JobPostBundle:RequirementJob')->findBy(['job'=>$jobDetails]);

        return $this->render('requirementjob/index.html.twig', array(
            'requirementJobs' => $requirementJobs,
        ));
    }

    /**
     * Creates a new requirementJob entity.
     *
     * @Route("/new/{id}", name="jobpost_requirementjob_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,JobDetails $jobDetails)
    {
        $em = $this->getDoctrine()->getManager();
        $req = $em->getRepository(RequirementMaster::class)->findAll();
        $requirementJob = new Requirementjob();
        $form = $this->createForm('JobPostBundle\Form\RequirementJobType', $requirementJob,['requirements'=>$req]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $requirementJob->setJob($jobDetails);
            if($form["requirement"]->getData() == 'add'){
                $requirementJob->setRequirement($this->createRequirementsMaster($form["customRequirement"]->getData()));
            }else{
                $requirementJob->setRequirement($em->getRepository(RequirementMaster::class)->findOneById($form["requirement"]->getData()));
            }
            $em->persist($requirementJob);
            $em->flush();

            return $this->redirect($this->get('router')->generate('jobpost_show', array('id' => $jobDetails->getId())));
        }
        $html = $this->renderView('requirementjob/new.html.twig', array(
            'requirementJob' => $requirementJob,
            'jobDetails'=>$jobDetails,
            'form' => $form->createView(),
        ));
        return new JsonResponse($html);
    }

    /**
     * Finds and displays a requirementJob entity.
     *
     * @Route("/{id}", name="jobpost_requirementjob_show")
     * @Method("GET")
     */
    public function showAction(RequirementJob $requirementJob)
    {
        $deleteForm = $this->createDeleteForm($requirementJob);

        return $this->render('requirementjob/show.html.twig', array(
            'requirementJob' => $requirementJob,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing requirementJob entity.
     *
     * @Route("/{id}/edit", name="jobpost_requirementjob_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RequirementJob $requirementJob)
    {
        $deleteForm = $this->createDeleteForm($requirementJob);
        $editForm = $this->createForm('JobPostBundle\Form\RequirementJobType', $requirementJob);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jobpost_requirementjob_edit', array('id' => $requirementJob->getId()));
        }

        return $this->render('requirementjob/edit.html.twig', array(
            'requirementJob' => $requirementJob,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a requirementJob entity.
     *
     * @Route("/delete/{id}", name="jobpost_requirementjob_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $req = $em->getRepository(RequirementJob::class)->findOneById($id);
        $jobId = $req->getJob()->getId();
      /*  $form = $this->createDeleteForm($requirementJob);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {*/
            $em = $this->getDoctrine()->getManager();
            $em->remove($req);
            $em->flush();
       // }

        return $this->redirect($this->get('router')->generate('jobpost_show', array('id' => $jobId)));
    }

    /**
     * Creates a form to delete a requirementJob entity.
     *
     * @param RequirementJob $requirementJob The requirementJob entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RequirementJob $requirementJob)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jobpost_requirementjob_delete', array('id' => $requirementJob->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * 
     * @param string $name
     * @return int
     */
    private function createRequirementsMaster($name){
        $em = $this->getDoctrine()->getManager();
        $reqMaster = new RequirementMaster();
        $reqMaster->setRequirementName($name);
        $reqMaster->setGroupName(explode(' ', $name)[0]);
        $reqMaster->setStatus(1);
        $reqMaster->setTs(new \DateTime('now'));
        $em->persist($reqMaster);
        $em->flush();
        return $reqMaster;
    }
}
