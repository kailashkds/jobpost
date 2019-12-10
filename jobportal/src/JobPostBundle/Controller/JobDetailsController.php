<?php

namespace JobPostBundle\Controller;

use JobPostBundle\Entity\JobDetails;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Jobdetail controller.
 *
 * @Route("jobpost")
 */
class JobDetailsController extends Controller
{
    /**
     * Lists all jobDetail entities.
     *
     * @Route("/", name="jobpost_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jobDetails = $em->getRepository('JobPostBundle:JobDetails')->findAll();

        return $this->render('jobdetails/index.html.twig', array(
            'jobDetails' => $jobDetails,
        ));
    }

    /**
     * Creates a new jobDetail entity.
     *
     * @Route("/new", name="jobpost_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $jobDetail = new JobDetails();
        $form = $this->createForm('JobPostBundle\Form\JobDetailsType', $jobDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jobDetail);
            $em->flush();

            return $this->redirectToRoute('jobpost_show', array('id' => $jobDetail->getId()));
        }

        return $this->render('jobdetails/new.html.twig', array(
            'jobDetail' => $jobDetail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jobDetail entity.
     *
     * @Route("/{id}", name="jobpost_show")
     * @Method("GET")
     */
    public function showAction(JobDetails $jobDetail)
    {
        $deleteForm = $this->createDeleteForm($jobDetail);

        return $this->render('jobdetails/show.html.twig', array(
            'jobDetail' => $jobDetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a jobDetail entity.
     *
     * @Route("/job-requirements/{id}", name="jobpost_requirements")
     * @Method("GET")
     */
    public function jobRequirementsAction(JobDetails $jobDetail)
    {
        $deleteForm = $this->createDeleteForm($jobDetail);

        return $this->render('jobdetails/show.html.twig', array(
            'jobDetail' => $jobDetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jobDetail entity.
     *
     * @Route("/{id}/edit", name="jobpost_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, JobDetails $jobDetail)
    {
        $deleteForm = $this->createDeleteForm($jobDetail);
        $editForm = $this->createForm('JobPostBundle\Form\JobDetailsType', $jobDetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jobpost_edit', array('id' => $jobDetail->getId()));
        }

        return $this->render('jobdetails/edit.html.twig', array(
            'jobDetail' => $jobDetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jobDetail entity.
     *
     * @Route("/{id}", name="jobpost_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, JobDetails $jobDetail)
    {
        $form = $this->createDeleteForm($jobDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jobDetail);
            $em->flush();
        }

        return $this->redirectToRoute('jobpost_index');
    }

    /**
     * Creates a form to delete a jobDetail entity.
     *
     * @param JobDetails $jobDetail The jobDetail entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(JobDetails $jobDetail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jobpost_delete', array('id' => $jobDetail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
}
